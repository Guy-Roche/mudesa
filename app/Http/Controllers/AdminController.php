<?php

namespace App\Http\Controllers;

use App\Mail\verificationCodeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    // dashboard index
    public function index()
    {
        return view('index');
    } //end method

    //deconnexion
    public function logoutadmin(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Rediriger vers la page de connexion
        $notify = array(
            'message' => 'Admin Deconnecté avec succès',
            'alert-type' => 'info'
        );

        return redirect('/')
            ->with($notify);
    } //end method

    //Connecter admin avec envoi de code par mail pour verification
    public function adminLogin(Request $request)
    {
        //Validation des données du formulaire
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:5',
        ]);
        //Obtention des informations d'identification
        $credentials = $request->only('email', 'password');

        //Tentative d'authentification
        if (Auth::attempt($credentials)) {
            // Authentification réussie
            $user = Auth::user();
            $verificationCode = rand(100000, 999999); // Générer un code de vérification à 6 chiffres
            $user->verification_code = $verificationCode;

            Session([
                'verification_code' => $verificationCode,
                'user_id' => $user->id,
                'code_expires_at' => now()->addMinutes(5), // Le code expire dans 5 minutes
                'code_attempts' => 0, // Nombre de tentatives de code
            ]);
            // Envoyer le code de vérification par e-mail
            Mail::to($user->email)->send(new verificationCodeMail($verificationCode));
            Auth::logout(); // Déconnecter l'utilisateur jusqu'à ce qu'il vérifie le code
            return redirect()->route('admin.verification.form') // Rediriger vers une page de vérification
                ->with('status', 'Code de vérification envoyé à votre adresse e-mail. Il expire dans 5 minutes.');
        } //end if

        // Authentification échouée
        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies sont incorrectes.',
        ]);
    } //end method

    // Afficher le formulaire de vérification
    public function showVerificationForm()
    {
        return view('auth.verify_code');
    } //end method

    // Vérifier le code de vérification
    public function verifyCode(Request $request)
    {
        $request->validate(
            [
                'code' => 'required|numeric|digits:6',
            ],
            [
                'code.required' => 'Le code de vérification est requis.',
                'code.numeric' => 'Le code de vérification doit être un nombre.',
                'code.digits' => 'Le code de vérification doit comporter exactement 6 chiffres.',
            ]
        );

        // Vérifier si le code de vérification correspond
        if ($request->code == session('verification_code')) {
            //
            Auth::loginUsingId(session('user_id')); // Connecter l'utilisateur
            // Supprimer les données de session liées à la vérification
            session()->forget(['verification_code', 'user_id']);
            return redirect()->intended('/admin/dashboard'); // Rediriger vers le tableau de bord ou une autre page protégée
        }
        // Code de vérification invalide
        return back()->withErrors([
            'code' => 'Le code de vérification est invalide.',
        ]);
    } //end method   

    //edit admin profile
    public function editprofile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.editprofile', compact('adminData'));
    } //end method

    //update admin profile
    public function updateprofile(Request $request)
    {
        $id = Auth::user()->id;
        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        
        if ($request->file('photo')) {
            # code...
            $request->validate(
                [
                    'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                ],
                [
                    'photo.image' => 'La photo de profil doit être une image',
                    'photo.mimes' => 'La photo de profil doit être un fichier de type : jpeg, png, jpg',
                    'photo.max' => 'La photo de profil ne doit pas dépasser 2 Mo',
                ]
            );
            // 📥 Récupération du fichier
            $profileImage = $request->file('photo');

            // 📛 Nom original et extension
            $originalName = $profileImage->getClientOriginalName();
            $nameWithoutExt = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $profileImage->getClientOriginalExtension();

            // 🆕 Nom unique
            $profileImageName = 'admin_' . time() . '.' . $extension;

            // 📁 Dossier cible
            $destinationPath = public_path('backend/images/admins');

            // 📂 Création du dossier si nécessaire
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // 🗑️ Suppression de l’ancienne image
            $oldImagePath = $destinationPath . '/' . $admin->photo;
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            // 📤 Déplacement du nouveau fichier
            $profileImage->move($destinationPath, $profileImageName);

            // 🖊️ Mise à jour du modèle
            $admin->photo = $profileImageName;
        }
        $admin->update();

        $notify = array(
            'message' => 'Profil Admin Mis à Jour avec Succès',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notify);
    } //end method

    //update admin password
    public function updatepassword(Request $request)
    {
        $request->validate(
            [
                'old_password' => 'required',
                'new_password' => 'required|min:5|confirmed',
            ],
            [
                'old_password.required' => 'L\'ancien mot de passe est requis.',
                'new_password.required' => 'Le nouveau mot de passe est requis.',
                'new_password.min' => 'Le nouveau mot de passe doit contenir au moins 5 caractères.',
                'new_password.confirmed' => 'La confirmation du nouveau mot de passe ne correspond pas.',
            ]
        );
        //Vérifier si l'ancien mot de passe est correct
        $admin = Auth::user();
        //
        if (Hash::check($request->old_password, $admin->password)) {
            // rechercher l'utilisateur par son ID
            $user = User::findOrFail($admin->id);
            // mettre à jour le mot de passe
            $user->password = Hash::make($request->new_password);
            $user->update();
            Auth::logout(); // Déconnecter l'utilisateur après le changement de mot de passe
            $notify = array(
                'message' => 'Mot de Passe Mis à Jour avec Succès',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notify);
        } else {
            $notify = array(
                'message' => 'L\'ancien mot de passe est incorrect.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notify);
        }
    } //end method

}

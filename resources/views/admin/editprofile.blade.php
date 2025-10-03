@extends('layouts.admin.master')
@section('title')
    Profil Admin
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Mon Profil</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <div class="align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ !empty($adminData->photo) ? url('backend/images/admins/' . $adminData->photo) : url('backend/images/no_image.jpg') }}"
                                    class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">

                                <div class="overflow-hidden ms-4">
                                    <h4 class="m-0 text-dark fs-20">{{ strtoupper($adminData->name) }}</h4>
                                    <p class="my-1 text-muted fs-16">{{ $adminData->email }}</p>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col-lg-6 col-xl-6">
                                <div class="card border mb-0">

                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4 class="card-title mb-0">Mettre à jour le Profil</h4>
                                            </div><!--end col-->
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <form action="{{ route('admin.updateprofile') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group mb-3 row">
                                                <label class="form-label">Nom</label>
                                                <div class="col-lg-12 col-xl-12">
                                                    <input class="form-control" type="text" name="name"
                                                        value="{{$adminData->name}}">
                                                </div>
                                            </div>

                                            <div class="form-group mb-3 row">
                                                <label class="form-label">Email</label>
                                                <div class="col-lg-12 col-xl-12">
                                                    <input class="form-control" type="text" name="email"
                                                        value="{{$adminData->email}}">
                                                </div>
                                            </div>

                                            <div class="form-group mb-3 row">
                                                <label class="form-label">Téléphone</label>
                                                <div class="col-lg-12 col-xl-12">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-phone-outline"></i></span>
                                                        <input class="form-control" type="text" name="phone"
                                                            placeholder="Téléphone" aria-describedby="basic-addon1"
                                                            value="{{$adminData->phone}}">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group mb-3 row">
                                                <label class="form-label">Adresse</label>
                                                <div class="col-lg-12 col-xl-12">
                                                    <textarea name="address" id="address" class="form-control">{{ $adminData->address }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group mb-3 row">
                                                <label class="form-label">Profile Photo</label>
                                                <div class="col-lg-12 col-xl-12">
                                                    <input class="form-control" type="file" name="photo"
                                                        id="image">
                                                </div>
                                            </div>

                                            <div class="form-group mb-3 row">
                                                <label class="form-label"> </label>
                                                <div class="col-lg-12 col-xl-12">
                                                    <img id="showImage"
                                                        src="{{ !empty($adminData->photo) ? url('backend/images/admins/' . $adminData->photo) : url('backend/images/no_image.jpg') }}"
                                                        class="rounded-circle avatar-xxl img-thumbnail float-start"
                                                        alt="image profile">

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-12 col-xl-12">
                                                    <button type="submit" class="btn btn-primary">Modifier Profil</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div><!--end card-body-->
                                </div>
                            </div>

                            <div class="col-lg-6 col-xl-6">
                                <div class="card border mb-0">

                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4 class="card-title mb-0">Changer Mot de Passe</h4>
                                            </div><!--end col-->
                                        </div>
                                    </div>
                                    <form action="{{ route('admin.updatepassword') }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="card-body mb-0">
                                            <div class="form-group mb-3 row">
                                                <label class="form-label">Ancien Mot de Passe</label>
                                                <div class="col-lg-12 col-xl-12">
                                                    <input class="form-control" type="password" placeholder="Ancien Mot de Passe" name="old_password" id="old_password">
                                                </div>
                                                    @error('old_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label">Nouveau Mot de Passe</label>
                                                <div class="col-lg-12 col-xl-12">
                                                    <input class="form-control" type="password" placeholder="Nouveau Mot de Passe" name="new_password" id="new_password">
                                                </div>
                                                @error('new_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label">Confirmer Mot de Passe</label>
                                                <div class="col-lg-12 col-xl-12">
                                                    <input class="form-control" type="password"
                                                        placeholder="Confirmer Mot de Passe" name="new_password_confirmation" id="new_password_confirmation">
                                                </div>
                                                @error('new_password_confirmation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-12 col-xl-12">
                                                    <button type="submit" class="btn btn-primary">Modifier MDP</button>
                                                </div>
                                            </div>
                                    </form>

                                </div><!--end card-body-->
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- container-fluid -->

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    }) 
</script>
@endsection

@extends('layouts.manage')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Edit Package Form</h4>
                <p class="card-category"> Please enter all details </p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('manage:package:update', $package->id) }}">
                    @method('put')
                    @csrf

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Full Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="inputPassword" value="{{ $package->name }}">
                        
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }} 
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Package Description</label>
                        <div class="col-sm-8">
                            <textarea rows="8" class="form-control @error('description') is-invalid @enderror" name="description">{{ $package->description }}</textarea>
                            
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }} 
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Package Content</label>
                        <div class="col-sm-8">
                            <textarea rows="8" class="form-control @error('content') is-invalid @enderror" name="content">{{ $package->content }}</textarea>
                            
                            @error('content')
                            <div class="invalid-feedback">
                                {{ $message }} 
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Package Price / PAX</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend3">RM</span>
                                </div>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" aria-describedby="inputGroupPrepend3" value="{{ $package->price }}">
                                
                            
                                @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }} 
                                </div>
                                @enderror
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary pull-right" type="submit">Submit form</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
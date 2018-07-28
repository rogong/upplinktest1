@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Submit Resume</div>

                <div class="panel-body">
                        @if (session('response'))
                        <div class="alert alert-success">
                            {{ session('response') }}
                        </div>
                    @endif
          
                       @if (count('$errors') > 0)
                            @foreach($errors->all as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                        @endforeach
                    @endif
 
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{route('getcv')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">first name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            <label for="surname" class="col-md-4 control-label">surname</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cover_letter') ? ' has-error' : '' }}">
                            <label for="cover_letter control-label"> cover_letters:</label>

                            <div >
                               <textarea id="job-cover_letter" name="cover_letter" class="form-control" rows="7">
                                    {{ old('cover_letter') }}
                                </textarea>
                                @if($errors->has('cover_letter'))
                                    <span class="help-block">{{ $errors->first('cover_letter') }}</span>
                                @endif
							
								
                            </div>
                               </div>

                               <div class="form-group{{ $errors->has('imagePath') ? ' has-error' : '' }}">

                                <label for="imagePath" class="col-md-4 control-label">Passport</label>
                       
                                                   <div class="col-md-6">
                                               
                            <input id="imagePath" type="file" class="form-control" name="imagePath"
                            value="{{old('imagePath')}}" >
                       
                                                       @if ($errors->has('imagePath'))
                                                           <span class="help-block">
                                                               <strong>{{ $errors->first('imagePath') }}</strong>
                                                           </span>
                                                       @endif
                                                   </div>
                                               </div>

                                               <div class="form-group{{ $errors->has('resume') ? ' has-error' : '' }}">

                                                <label for="resume" class="col-md-4 control-label">Resume</label>
                                       
                                                                   <div class="col-md-6">
                                                               
                                            <input id="resume" type="file" class="form-control" name="resume"
                                            value="{{old('resume')}}" >
                                       
                                                                       @if ($errors->has('resume'))
                                                                           <span class="help-block">
                                                                               <strong>{{ $errors->first('resume') }}</strong>
                                                                           </span>
                                                                       @endif
                                                                   </div>
                                                               </div>

                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')



    <div class="page-inner">
        <div class="page-title">
            <h3>Events</h3>
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{url('home')}}">Home</a></li>

                    <li class="active">Upload Event</li>
                </ol>
            </div>
        </div>
        @include('notification')
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Events</h4><br>
                            @include('notification')
                        </div>
                        <div class="panel-body">
                            <form method="post" enctype="multipart/form-data" action="{{url('upload-event')}}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="location" class="form-control" placeholder="Transcorp, Abuja" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="tag" class="form-control" placeholder="Tag" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="link" class="form-control" placeholder="www.example.com" >
                                </div>
                                <div class="form-group">
                                    <label>Event Date</label>
                                    <input type="date" name="date" class="form-control" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label>Event Time</label>
                                    <input type="time" name="time" class="form-control" placeholder="" required>
                                </div>



                                <div class="file-field">
                                    <div class="btn btn-primary btn-sm float-left">
                                        <span>Choose Image</span>
                                        <input type="file" name="image" required>
                                    </div>

                                </div><br>


                                <div class="file-field">
                                    <div class="btn btn-primary btn-sm float-left">
                                        <span>Choose video</span>
                                        <input type="file" name="video">
                                    </div>

                                </div><br>

                                <div class="file-field">
                                    <div class="btn btn-primary btn-sm float-left">
                                        <span>Choose audio</span>
                                        <input type="file" name="audio">
                                    </div>

                                </div><br>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea2">Event Description</label>
                                    <textarea class="form-control rounded-0" name="desc" id="exampleFormControlTextarea2" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div><!-- Row -->
        </div><!-- Main Wrapper -->
        <div class="page-footer">
            <p class="no-s">2020 &copy; Groove point.</p>
        </div>
    </div><!-- Page Inner -->
@endsection

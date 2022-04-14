@extends('layouts.frontend')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="my-3">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
            </ol>
        </nav>
        <div class="row my-5 mb-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="container">
                    <form action="https://formsubmit.co/municipalitytalusansupp@gmail.com" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name"  class="mb-2">Your Name</label>
                            <input type="name" class="form-control" name="name" placeholder="Your Name">
                            <label for="email" class="mb-2 mt-2">Your Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Your email">
                            <input type="hidden" name="_next" value="http://talusan-city.herokuapp.com/thanks">
                            <input type="hidden" name="_captcha" value="false">
                            <input type="hidden" name="_subject" value="New submission!">
                        </div>
                        <div class="form-group mt-3">
                            <label for="meassage" class="mb-2">Your Message</label>
                            <textarea id="editor" name="message" class="form-control rounded-0" rows="15" placeholder="Message"></textarea>
                        </div>
                        <div class="row px-5">
                            <button type="submit" class="btn btn-outline-primary rounded mt-2 form-control">Submit</button>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
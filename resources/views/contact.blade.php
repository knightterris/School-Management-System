@extends('welcome')
@section('content')
    <div class="row mt-5">
        <div class="col">
            <!-- contact -->
            <section class="section bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="section-title">Contact Us</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 mb-4 mb-lg-0">
                            <form action="{{ route('main#createMessage') }}" method="POST">
                                @csrf
                                <input type="text"
                                    class="form-control mb-3 @error('name') is-invalid
                                                @enderror"
                                    id="name" name="name" placeholder="Your Name" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror

                                <input type="email"
                                    class="form-control mb-3 @error('email') is-invalid
                                                @enderror"
                                    id="mail" name="email" placeholder="Your Email" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror

                                <input type="text"
                                    class="form-control mb-3 @error('subject') is-invalid
                                                @enderror"
                                    id="subject" name="subject" placeholder="Subject" required>
                                @error('subject')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror

                                <textarea name="message" id="message"
                                    class="form-control mb-3 @error('message') is-invalid
                                                @enderror"
                                    placeholder="Your Message" required></textarea>
                                @error('message')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror

                                <button type="submit" value="send" class="btn btn-primary">SEND MESSAGE</button>
                            </form>
                        </div>
                        <div class="col-lg-5">
                            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit recusandae
                                voluptates
                                doloremque veniam temporibus porro culpa ipsa, nisi soluta minima saepe laboriosam debitis
                                nesciunt.
                                Dolore, labore. Accusamus nulla sed cum aliquid exercitationem debitis error harum porro
                                maxime quo
                                iusto aliquam dicta modi earum fugiat, vel possimus commodi, deleniti et veniam, fuga ipsum
                                praesentium. Odit unde optio nulla ipsum quae obcaecati! Quod esse natus quibusdam
                                asperiores quam
                                vel, tempore itaque architecto ducimus expedita</p>
                            <a href="tel:+8802057843248" class="text-color h5 d-block">+880 20 5784 3248</a>
                            <a href="mailto:yourmail@email.com" class="mb-5 text-color h5 d-block">yourmail@email.com</a>
                            <p>71 Shelton Street<br>London WC2H 9JQ England</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /contact -->

            <!-- gmap -->
            <section class="section pt-0">
                <!-- Google Map -->
                <div id="map_canvas" data-latitude="51.507351" data-longitude="-0.127758"></div>
            </section>
            <!-- /gmap -->
        </div>
    </div>
@endsection

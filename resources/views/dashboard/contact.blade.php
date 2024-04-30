@extends('templates.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- HEADER --}}
                    <div class="card-header">
                        <h5 class="title">Contact Us</h5>
                    </div>
                    {{-- CONTENT --}}
                    <div class="card-body">
                        <div class="container py-5">
                            <div class="row">
                                <div class="col-lg-8 mx-auto">
                                    <h1 class="mb-4">Contact Us</h1>
                                    <form>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name"
                                                placeholder="Enter your name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Enter your email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea class="form-control" id="message" rows="5" placeholder="Enter your message" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="container py-5">
                            <div class="row">
                                <div class="col-lg-8 mx-auto">

                                    <div class="form-group">
                                        <h6>Alamat Lengkap</h6>
                                        <p class="card-text">123 Street Name<br>City, Country<br>Phone: +123 456
                                            789<br>Email: info@example.com</p>
                                    </div>

                                    <div class="form-group">
                                        <h6>Foto kantor</h6>
                                        <img src="../assets/img/kantorr.jpeg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="container py-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Location</h2>
                                    <!-- Embed Google Maps using iframe -->
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d394.297471041916!2d-122.43707160485646!3d37.7576925779908!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808f7e05676a1963%3A0x3235f5adeab99e14!2sEureka%20Valley%20Arts!5e0!3m2!1sen!2sin!4v1714352478414!5m2!1sen!2sin"
                                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- END CONTENT --}}

                </div>
            </div>
        </div>
    </div>
@endsection

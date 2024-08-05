@include('frontend.partials.header')
<div class="container">
    <div class="row">
        <div class="col-12 page-heading-privacy-policy">
            Contact Us
            <p class="hint-text">We'd love to hear from you, please drop us a line if you've any query related to our products or services.</p>

        </div>


        <div class="col-8 offset-1 m-auto ">

            <div class="contact-form m-auto contact-form-submit" >
                <form action="{{route('create-contact')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" id="inputName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email Address</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Message</label>
                        <textarea class="form-control" id="inputMessage" rows="5" name="massage" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block send-form-btn" style="background: #00a651; box-shadow:none; border-color:#00a651;"><i class="fa fa-paper-plane"></i> Send Message</button>
                </form>
            </div>


        </div>
    </div>
</div>
@include('frontend.partials.footer')

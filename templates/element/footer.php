<!-- src/templates/element/footer.php -->

<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <h2>About Us</h2>
                    <p>
                    Coral Coast Travel has been a specialist in Southeast Asian Travel since 1984, now expanding to international travel. 
                    </p>
                    <p>We prioritise modern travel experiences through an end-to-end online platform, offering worldwide travel options including cruises and air travel, along with accommodation, car rentals, travel insurance, and translation services. </p>
                </div>
                <div class="col-md-4 col-sm-12">
                    <h2>Useful Links</h2>
                    <ul class="list-unstyled link-list">
                        <li><a ui-sref="about" >About us</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="portfolio" >Portfolio</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="products" >Latest jobs</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="gallery" >Pricing</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="contact" >Contact us</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-12 map-img">
                    <h2><a href= <?= $this->Url->build(['controller' => 'ContactForms', 'action' => 'add'])?>>Contact Us</a></h2>
                    <address class="md-margin-bottom-40">
                        Coral Coast <br>
                        Wellington Rd, <br>
                        Clayton, VIC <br>
                    </address>
                    <a href= <?= $this->Url->build(['controller' => 'ContactForms', 'action' => 'add'])?>>Make an enquiry</a>
                </div>
            </div>
        </div>
        

    </footer>

    <div class="copy">
            

    </div>
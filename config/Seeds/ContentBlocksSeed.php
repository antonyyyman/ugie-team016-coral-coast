<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class ContentBlocksSeed extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'parent' => 'global',
                'label' => 'Website Title',
                'description' => 'Title of the website',
                'slug' => 'website-title',
                'type' => 'text',
                'value' => 'Coral Coast Travel',
            ],
            [
                'parent' => 'global',
                'label' => 'Logo',
                'description' => 'Image of the website logo',
                'slug' => 'logo',
                'type' => 'image',
                'value' => '../webroot/img/logo_coralcoast.png',
            ],
            [
                'parent' => 'home',
                'label' => 'About Us Content',
                'description' => 'Content for the about us section',
                'slug' => 'about-us-content',
                'type' => 'html',
                'value' => '<p>Coral Coast Travel has been a specialist in Southeast Asian Travel since 1984, now expanding to international travel.</p><p>We prioritise modern travel experiences through an end-to-end online platform, offering worldwide travel options including cruises and air travel, along with accommodation, car rentals, travel insurance, and translation services.</p>',
            ],
            [
                'parent' => 'home',
                'label' => 'Contact Us Content',
                'description' => 'Content for the contact us section',
                'slug' => 'contact-us-content',
                'type' => 'html',
                'value' => '<address class="md-margin-bottom-40">Coral Coast <br> Wellington Rd, <br> Clayton, VIC </address>',
            ],
            [
                'parent' => 'home',
                'label' => 'Footer Links',
                'description' => 'Content for the other links section in the footer',
                'slug' => 'footer-links',
                'type' => 'html',
                'value' => '<ul class="list-unstyled link-list"><li><a href="/car-rentals">Car Rentals</a></li><li><a href="/cruises">Cruises</a></li><li><a href="/insurances">Insurances</a></li><li><a href="/translations">Translations</a></li><li><a href="/dashboard">Admin Dashboard</a></li></ul>',
            ],
            [
                'parent' => 'home',
                'label' => 'Travel Deals text',
                'description' => 'Title for travel deals section',
                'slug' => 'travel-deals-title',
                'type' => 'text',
                'value' => 'Travel Deals',
            ],
            [
                'parent' => 'home',
                'label' => 'Travel Deals Description',
                'description' => 'Description for travel deals section',
                'slug' => 'travel-deals-description',
                'type' => 'text',
                'value' => 'Here are some of the best travel deals that you can use to make a trip memorable for you!',
            ],
            [
                'parent' => 'home',
                'label' => 'Flight Title',
                'description' => 'Title for flights section','slug' => 'flight-title',
                'type' => 'text',
                'value' => 'Flights',
            ],
            [
                'parent' => 'home',
                'label' => 'Hotel Title',
                'description' => 'Title for hotels section',
                'slug' => 'hotel-title',
                'type' => 'text',
                'value' => 'Hotels',
            ],
            [
                'parent' => 'home',
                'label' => 'Cruise Title',
                'description' => 'Title for cruises section',
                'slug' => 'cruise-title',
                'type' => 'text',
                'value' => 'Cruises',
            ],
            [
                'parent' => 'home',
                'label' => 'Car Rental Title',
                'description' => 'Title for car rental section',
                'slug' => 'car-rental-title',
                'type' => 'text',
                'value' => 'Car Rental',
            ],
            [
                'parent' => 'home',
                'label' => 'Translations Title',
                'description' => 'Title for translations section',
                'slug' => 'translations-title',
                'type' => 'text',
                'value' => 'Translations',
            ],
            [
                'parent' => 'home',
                'label' => 'Insurance Title',
                'description' => 'Title for insurance section',
                'slug' => 'insurance-title',
                'type' => 'text',
                'value' => 'Insurance',
            ],
        ];

        $table = $this->table('content_blocks');
        $table->insert($data)->save();
    }
}

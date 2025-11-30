<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PageContent;

class PageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            // Home Page - Hero Section
            [
                'page' => 'home',
                'section' => 'hero',
                'content_key' => 'home_hero_main-title',
                'content' => 'The Art of Automotive Perfection',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'home',
                'section' => 'hero',
                'content_key' => 'home_hero_description',
                'content' => 'Where precision engineering meets sophisticated design. Experience the pinnacle of automotive excellence with our exclusive collection.',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'home',
                'section' => 'hero',
                'content_key' => 'home_hero_primary-button',
                'content' => 'Discover Collection',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'home',
                'section' => 'hero',
                'content_key' => 'home_hero_secondary-button',
                'content' => 'Private Consultation',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // Home Page - Features Section
            [
                'page' => 'home',
                'section' => 'features',
                'content_key' => 'home_features_section-title',
                'content' => 'The Mobiku Promise',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'home',
                'section' => 'features',
                'content_key' => 'home_features_description',
                'content' => 'Uncompromising quality, exceptional service, and timeless elegance in every detail.',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // Home Page - Exclusive Collection Section
            [
                'page' => 'home',
                'section' => 'collection',
                'content_key' => 'home_collection_section-title',
                'content' => 'Exclusive Collection',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'home',
                'section' => 'collection',
                'content_key' => 'home_collection_description',
                'content' => 'Each model a masterpiece, meticulously designed for the discerning enthusiast.',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // Home Page - Testimonials Section
            [
                'page' => 'home',
                'section' => 'testimonials',
                'content_key' => 'home_testimonials_section-title',
                'content' => 'Distinctive Voices',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'home',
                'section' => 'testimonials',
                'content_key' => 'home_testimonials_description',
                'content' => 'Insights from those who have experienced the Mobiku difference.',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // Home Page - CTA Section
            [
                'page' => 'home',
                'section' => 'cta',
                'content_key' => 'home_cta_section-title',
                'content' => 'Begin Your Journey',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'home',
                'section' => 'cta',
                'content_key' => 'home_cta_description',
                'content' => 'Experience the extraordinary. Schedule your exclusive consultation and discover automotive perfection.',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // About Page - Hero Section
            [
                'page' => 'about',
                'section' => 'hero',
                'content_key' => 'about_hero_main-title',
                'content' => 'Our',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'hero',
                'content_key' => 'about_hero_highlight-title',
                'content' => 'Legacy',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'hero',
                'content_key' => 'about_hero_sub-title',
                'content' => 'of Excellence',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'hero',
                'content_key' => 'about_hero_description',
                'content' => 'A journey of innovation, craftsmanship, and unwavering commitment to automotive perfection.',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // About Page - Heritage Section
            [
                'page' => 'about',
                'section' => 'heritage',
                'content_key' => 'about_heritage_title',
                'content' => 'Our',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'heritage',
                'content_key' => 'about_heritage_highlight',
                'content' => 'Heritage',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'heritage',
                'content_key' => 'about_heritage_paragraph-1',
                'content' => 'Founded in 2010, Mobiku emerged from a passion for innovation and a commitment to delivering exceptional vehicles equipped with cutting-edge technology to the Indonesian market.',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'heritage',
                'content_key' => 'about_heritage_paragraph-2',
                'content' => 'With over 15 years of experience in the automotive industry, we have served more than 100,000 customers across Indonesia with various models that suit their needs and lifestyle preferences.',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'heritage',
                'content_key' => 'about_heritage_paragraph-3',
                'content' => 'We continue to innovate to create vehicles that are not only comfortable and safe, but also environmentally friendly and efficient in fuel consumption.',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // About Page - Purpose Section
            [
                'page' => 'about',
                'section' => 'purpose',
                'content_key' => 'about_purpose_title',
                'content' => 'Our',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'purpose',
                'content_key' => 'about_purpose_highlight',
                'content' => 'Purpose',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'purpose',
                'content_key' => 'about_purpose_description',
                'content' => 'The principles and goals that guide our journey forward.',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // About Page - Vision Section
            [
                'page' => 'about',
                'section' => 'vision',
                'content_key' => 'about_vision_title',
                'content' => 'Our Vision',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'vision',
                'content_key' => 'about_vision_content',
                'content' => 'To become the leading automotive company in Indonesia, providing the best mobility solutions through technological innovation and superior design.',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // About Page - Mission Section
            [
                'page' => 'about',
                'section' => 'mission',
                'content_key' => 'about_mission_title',
                'content' => 'Our Mission',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'mission',
                'content_key' => 'about_mission_point-1',
                'content' => 'Deliver high-quality vehicles with the latest technology',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'mission',
                'content_key' => 'about_mission_point-2',
                'content' => 'Provide exceptional and reliable after-sales service',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'mission',
                'content_key' => 'about_mission_point-3',
                'content' => 'Create safe and comfortable driving experiences',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'mission',
                'content_key' => 'about_mission_point-4',
                'content' => 'Support sustainability and a better environment',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // About Page - Values Section
            [
                'page' => 'about',
                'section' => 'values',
                'content_key' => 'about_values_title',
                'content' => 'Core',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'values',
                'content_key' => 'about_values_highlight',
                'content' => 'Values',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'values',
                'content_key' => 'about_values_description',
                'content' => 'The principles we uphold in every aspect of our business.',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'values',
                'content_key' => 'about_values_integrity_title',
                'content' => 'Integrity',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'values',
                'content_key' => 'about_values_integrity_desc',
                'content' => 'We uphold honesty and trust in every relationship.',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'values',
                'content_key' => 'about_values_innovation_title',
                'content' => 'Innovation',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'values',
                'content_key' => 'about_values_innovation_desc',
                'content' => 'We continuously innovate to create the best solutions for our customers.',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'values',
                'content_key' => 'about_values_satisfaction_title',
                'content' => 'Customer Satisfaction',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'values',
                'content_key' => 'about_values_satisfaction_desc',
                'content' => 'Customer satisfaction is our top priority in every product and service.',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // About Page - Team Section
            [
                'page' => 'about',
                'section' => 'team',
                'content_key' => 'about_team_title',
                'content' => 'Leadership',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'team',
                'content_key' => 'about_team_highlight',
                'content' => 'Team',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'section' => 'team',
                'content_key' => 'about_team_description',
                'content' => 'Experienced professionals supporting our vision and mission.',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // Contact Page - Hero Section
            [
                'page' => 'contact',
                'section' => 'hero',
                'content_key' => 'contact_hero_main-title',
                'content' => 'Get In',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'contact',
                'section' => 'hero',
                'content_key' => 'contact_hero_highlight-title',
                'content' => 'Touch',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'contact',
                'section' => 'hero',
                'content_key' => 'contact_hero_description',
                'content' => 'Connect with our team of experts who are ready to assist you with your automotive needs.',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // Contact Page - Information Section
            [
                'page' => 'contact',
                'section' => 'info',
                'content_key' => 'contact_info_title',
                'content' => 'Contact',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'contact',
                'section' => 'info',
                'content_key' => 'contact_info_highlight',
                'content' => 'Information',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // Contact Page - Message Form Section
            [
                'page' => 'contact',
                'section' => 'message',
                'content_key' => 'contact_message_title',
                'content' => 'Send Us a',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'contact',
                'section' => 'message',
                'content_key' => 'contact_message_highlight',
                'content' => 'Message',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // Contact Page - Booking Form Section
            [
                'page' => 'contact',
                'section' => 'booking',
                'content_key' => 'contact_booking_title',
                'content' => 'Book a',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'contact',
                'section' => 'booking',
                'content_key' => 'contact_booking_highlight',
                'content' => 'Test Drive',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // Contact Page - Location Section
            [
                'page' => 'contact',
                'section' => 'location',
                'content_key' => 'contact_location_title',
                'content' => 'Find',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'contact',
                'section' => 'location',
                'content_key' => 'contact_location_highlight',
                'content' => 'Our Location',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // Contact Page - Emergency Section
            [
                'page' => 'contact',
                'section' => 'emergency',
                'content_key' => 'contact_emergency_title',
                'content' => 'Emergency',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'contact',
                'section' => 'emergency',
                'content_key' => 'contact_emergency_highlight',
                'content' => '24/7',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'contact',
                'section' => 'emergency',
                'content_key' => 'contact_emergency_subtitle',
                'content' => 'Service',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'contact',
                'section' => 'emergency',
                'content_key' => 'contact_emergency_description',
                'content' => 'Need emergency assistance on the road? Contact us anytime, anywhere!',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // Contact Page - Dealerships Section
            [
                'page' => 'contact',
                'section' => 'dealerships',
                'content_key' => 'contact_dealerships_title',
                'content' => 'Official',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'contact',
                'section' => 'dealerships',
                'content_key' => 'contact_dealerships_highlight',
                'content' => 'Dealerships',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // Models Page - Hero Section
            [
                'page' => 'models',
                'section' => 'hero',
                'content_key' => 'models_hero_main-title',
                'content' => 'Our',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'models',
                'section' => 'hero',
                'content_key' => 'models_hero_highlight-title',
                'content' => 'Collection',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'models',
                'section' => 'hero',
                'content_key' => 'models_hero_description',
                'content' => 'Discover our exclusive range of premium vehicles, each meticulously crafted to deliver exceptional performance and sophisticated design.',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // Gallery Page - Hero Section
            [
                'page' => 'gallery',
                'section' => 'hero',
                'content_key' => 'gallery_hero_title',
                'content' => 'Galeri Mobiku',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'gallery',
                'section' => 'hero',
                'content_key' => 'gallery_hero_description',
                'content' => 'Jelajahi koleksi foto dan video mobil Mobiku terbaru.',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // FAQ Page - Hero Section
            [
                'page' => 'faq',
                'section' => 'hero',
                'content_key' => 'faq_hero_main-title',
                'content' => 'Frequently',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'faq',
                'section' => 'hero',
                'content_key' => 'faq_hero_highlight-title',
                'content' => 'Asked Questions',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'faq',
                'section' => 'hero',
                'content_key' => 'faq_hero_description',
                'content' => 'Find answers to common questions about Mobiku vehicles, services, and ownership experience.',
                'content_type' => 'text',
                'is_active' => true,
            ],

            // Testimonials Page - Hero Section
            [
                'page' => 'testimonials',
                'section' => 'hero',
                'content_key' => 'testimonials_hero_title',
                'content' => 'Testimoni Pelanggan',
                'content_type' => 'text',
                'is_active' => true,
            ],
            [
                'page' => 'testimonials',
                'section' => 'hero',
                'content_key' => 'testimonials_hero_description',
                'content' => 'Pengalaman nyata dari pelanggan kami yang telah mempercayai Mobiku.',
                'content_type' => 'text',
                'is_active' => true,
            ],
        ];

        foreach ($contents as $content) {
            PageContent::firstOrCreate(
                ['content_key' => $content['content_key']],
                $content
            );
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Campaign;
use App\Models\Contact;
use App\Models\Product;
use App\Models\SocialMedia;
use App\Models\Team;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $brand = Brand::first();

        if (!$brand) {
            $brand = new Brand();
            $brand->name = 'Lavendulce';
            $brand->logo = '/images/logo.png';
            $brand->description = 'Indulge in Sweet Perfection';
            $brand->goals = 'At Dissert, we believe that every moment deserves a touch of sweetness. Our passion for creating exquisite desserts stems from a deep-rooted love for bringing joy through flavors. We combine traditional recipes with innovative techniques to craft desserts that not only satisfy your sweet tooth but also tell a story with every bite.';
            $brand->save();
        }

        $products = Product::where('stock', '>', 0)->where('deadstock', false)->get();

        $teams = Team::all();

        $campaigns = Campaign::whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->get();
        
        $contact = Contact::first();
        if (!$contact) {
            $contact = new Contact();
            $contact->phone = '081234567890';
            $contact->email = 'admin@lavendulce.com';
            $contact->address = 'Jl. Kenangan No. 42, Kecamatan Kabupaten, Kota, Provinsi';
            $contact->save();
        }



        $socialMedias = SocialMedia::all();

        $contact->link_whatsapp = $this->formatWhatsApp($contact->phone);


        return view('welcome', compact('brand', 'products', 'teams', 'campaigns', 'contact', 'socialMedias'));
    }

    // function format nomor whatsapp
    public function formatWhatsApp($phone)
    {
        // hapus selain angka
        $phone = preg_replace('/\D/', '', $phone);
        // jika ada 0 di depan dihilangkan
        if (substr($phone, 0, 1) == "0") {
            $phone = substr($phone, 1);

            // cek jika ada 62 di depan
            if (substr($phone, 0, 2) != "62") {
                $phone = "62" . $phone;
            }
        } else {
            // cek jika ada 62 di depan
            if (substr($phone, 0, 2) != "62") {
                $phone = "62" . $phone;
            }
        }

        $phone = "https://api.whatsapp.com/send?phone=" . $phone;

        return $phone;

    }
}

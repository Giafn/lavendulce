<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/logo-square.png') }}" type="image/png">
    <title>Lavendulce - Sweet Perfection</title>


    <style>
        .main-container {
            font-family: 'Poppins', sans-serif;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

        .ck-content {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            word-break: break-word;
        }

        .editor-container_classic-editor .editor-container__editor {
            min-width: 795px;
            max-width: 795px;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        .ck.ck-content li { margin-left: 24px; }
    </style>
   <link rel="stylesheet" href="/css/ckeditor5.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-myrtleGreen text-white">
    {{-- Hero Section --}}
    <section class="relative h-screen flex items-center justify-center">
        <img src="{{ asset('images/hero.jpg') }}" alt="Beautiful Dessert" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 text-center">
            <h1 class="text-6xl font-bold mb-4">{{ $brand->name }}</h1>
            <p class="text-2xl mb-8">{{ $brand->description }}</p>
            <a href="#products" class="bg-periwinkle text-delftBlue px-6 py-3 rounded-full text-lg font-semibold hover:bg-opacity-90 transition duration-300">
                Explore Our Desserts
            </a>
        </div>
    </section>

    {{-- About Us Section --}}
    <section class="py-20 bg-vanilla text-delftBlue">
        <div class="container mx-auto px-4 sm:px-32">
            <h2 class="text-4xl font-bold mb-8 text-center">About Us</h2>
            <div class="ck-content clearfix">
                {!! $brand->goals !!}
            </div>
        </div>
    </section>    

    {{-- Products Section --}}
    <section id="products" class="py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-12 text-center">Our Signature Desserts</h2>
            <div class="flex flex-wrap justify-center gap-8">
                @foreach($products as $product)
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg w-full sm:w-[calc(50%-16px)] lg:w-[calc(33.333%-16px)]">
                        <img src="{{ asset("/storage/".$product->photo) }}" alt="{{ $product->name }}" class="w-full object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 text-delftBlue">{{ $product->name }}</h3>
                            <p class="text-myrtleGreen">
                                {{ $product->description }}
                            </p>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-black">{{ number_format($product->price, 0, ',', '.') }}</p>
                                <a href="{{ $contact->link_whatsapp }}&text=Hallo Saya Ingin Pesan {{ $product->name }}" 
                                   class="bg-periwinkle text-delftBlue px-4 py-2 rounded-full font-semibold hover:bg-opacity-90 transition duration-300 flex" target="_blank">
                                    Beli
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>    

    {{-- Campaigns & Promotions --}}
    <section class="py-20 bg-periwinkle text-delftBlue">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-8 text-center">Sweet Deals</h2>
            <div class="flex flex-wrap justify-center gap-8">
                @foreach($campaigns as $campaign)
                    <div class="bg-white rounded-lg p-8 w-full md:w-1/2 lg:w-2/5 xl:w-1/3">
                        <img src="{{ asset('/storage/'. $campaign->photo) }}" alt="{{ $campaign->title }}" class="w-full object-cover mb-4">
                        <h3 class="text-2xl font-semibold mb-4">{{ $campaign->title }}</h3>
                        <p class="mb-4">{{ $campaign->description }}</p>
                        <a href="{{ $contact->link_whatsapp }}&text=Hallo Saya Ingin Pesan dengan promo '{{ $campaign->title }}'" target="_blank"
                        class="inline-block bg-delftBlue text-white px-6 py-2 rounded-full font-semibold hover:bg-opacity-90 transition duration-300">
                            Shop Now
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    

    <section class="py-20">
        <div class="container mx-auto px-4 sm:px-32">
            <h2 class="text-4xl font-bold mb-12 text-center">Meet Our Sweet Team</h2>
    
            <!-- Alpine.js Slider -->
            <div x-data="slider()" class="relative overflow-hidden">
                <!-- Wrapper -->
                <div class="flex transition-transform duration-500 ease-in-out" :style="'transform: translateX(-' + (currentIndex * slideWidth) + 'px)'">
                    @foreach($teams as $member)
                        <div class="team-slide w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 text-center p-4">
                            <div class="w-40 h-40 rounded-full overflow-hidden mx-auto mb-4 bg-white">
                                <img src="{{ asset('/storage/'. $member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                            </div>                        
                            <h3 class="text-xl font-semibold mb-2">{{ $member->name }}</h3>
                            <p class="text-periwinkle">{{ $member->role }}</p>
                        </div>
                    @endforeach
                </div>
    
                <!-- Navigation Buttons -->
                <button @click="prevSlide" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">❮</button>
                <button @click="nextSlide" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">❯</button>
            </div>
        </div>
    </section>


    {{-- Contact Section --}}
    <section class="py-20 bg-vanilla text-delftBlue">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-12 text-center">Get in Touch</h2>
            <div class="max-w-3xl mx-auto text-center">
                <p class="mb-4">{{ $contact->address }}</p>
                <p class="mb-4">Phone: {{ $contact->phone }}</p>
                <p class="mb-8">Email: {{ $contact->email }}</p>
                <div class="flex justify-center space-x-4">
                    <a href="{{ $socialMedias->where('platform', "facebook")->first()?->url }}" class="text-delftBlue hover:text-myrtleGreen transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    </a>
                    <a href="{{ $socialMedias->where('platform', "instagram")->first()?->url }}" class="text-delftBlue hover:text-myrtleGreen transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    

    {{-- Footer --}}
    <footer class="bg-delftBlue pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center items-center">
                <nav class="w-full md:w-auto">
                    <ul class="flex flex-wrap justify-center md:justify-end space-x-6">
                        <li><a href="#" class="hover:text-periwinkle transition duration-300">Home</a></li>
                        <li><a href="#" class="hover:text-periwinkle transition duration-300">About</a></li>
                        <li><a href="#" class="hover:text-periwinkle transition duration-300">Products</a></li>
                        <li><a href="#" class="hover:text-periwinkle transition duration-300">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="mt-16 text-center text-sm">
                <p>&copy; {{ date('Y') }} Lavendulce. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!-- Swiper.js CDN -->
    <script>
        function slider() {
            return {
                currentIndex: 0,
                totalSlides: document.querySelectorAll('.team-slide').length,
                slideWidth: document.querySelector('.team-slide').offsetWidth,
                slidesPerView: window.innerWidth >= 1024 ? 3 : window.innerWidth >= 640 ? 2 : 1,
        
                updateSliderWidth() {
                    this.slideWidth = document.querySelector('.team-slide').offsetWidth;
                },
        
                nextSlide() {
                    this.currentIndex = (this.currentIndex + 1) % (this.totalSlides - this.slidesPerView + 1);
                },
        
                prevSlide() {
                    this.currentIndex = (this.currentIndex - 1 + (this.totalSlides - this.slidesPerView + 1)) % (this.totalSlides - this.slidesPerView + 1);
                },
        
                autoSlide() {
                    setInterval(() => {
                        this.nextSlide();
                    }, 3000);
                },
        
                init() {
                    this.updateSliderWidth();
                    this.autoSlide();
                    window.addEventListener("resize", () => {
                        this.updateSliderWidth();
                        this.slidesPerView = window.innerWidth >= 1024 ? 3 : window.innerWidth >= 640 ? 2 : 1;
                    });
                }
            };
        }
        </script>
</body>
</html>


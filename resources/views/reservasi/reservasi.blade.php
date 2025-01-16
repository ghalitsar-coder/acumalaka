@extends('layouts.hotel')

@section('content')
<div class="bg-[url('/public/background.png')] bg-cover bg-no-repeat w-full h-[75px]">
    <nav class="w-[1200px] h-[55px] flex place-self-center justify-between border-b-4 border-black">
        <div class="ml-[20px] place-self-center">
            <a href="{{ route('landing') }}" class="text-xl font-bold text-white">MyApp</a>
        </div>

        <div class="mr-[20px] place-self-center">
            <div class="text-white font-serif flex">
                <div class="mx-1">
                    <form action="{{ route('logout') }}" method="POST" class="">
                    @csrf
                        <button type="submit" class="w-[70px] rounded-full border-2 border-red-500 bg-red-500 bg-opacity-20 text-white hover:bg-opacity-50">
                            Logout</button>
                    </form>
                </div>

                <div class="w-[200px] mx-1 bg-blue-500 bg-opacity-20 rounded-full border-2 border-blue-500 text-center hover:bg-opacity-50">
                    <a href="#" class ="">
                        Nama yg login
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>

<div class="grid w-[940px] mx-auto mt-[30px] mb-8">
    <div class="w-[350px] h-[40px] border-b-[3px] border-black">
        <h3 class="font-serif text-4xl text-center">
            Pemesanan Kamar
        </h3>
    </div>
    <p class="font-serif text-lg text-gray-500">
        Pastikan kamu mengisi semua informasi di halaman ini benar sebelum melanjutkan ke pembayaran.
    </p>

    <div class="flex justify-between mt-[30px]">
        
        <div class="grid w-[550px]">
            <div class="grid bg-gray-300 mb-[20px] w-[550px] h-auto] rounded-[25px]">
                <div class="m-[30px]">
                    <div>
                        <h3 class="font-serif text-4xl">
                            Data Pemesan
                        </h3>
                    
                        <p class="font-serif text-base text-gray-500">
                            Isi semua kolom dengan benar untuk memastikan kamu dapat menerima bukti konfirmasi pemesanan.
                        </p>
                    </div>

                    <div>
                        <p class="mt-[10px] font-serif text-base text-gray-800">
                            Nama Lengkap :
                        </p>
                        <div class="place-self-center">
                            <input name="nama" id="nama" value=""
                            class="w-[480px] h-[40px] rounded-xl border-2 border-black px-4">
                        </div>
                    </div>    

                    <div class="flex justify-between mt-[10px]">
                        <div class="w-[260px]">
                            <p class="font-serif text-base text-gray-800">
                                Email :
                            </p>
                            <div class="place-self-end">
                                <input name="email" id="email" value=""
                                class="w-[260px] h-[40px] rounded-xl border-2 border-black px-4">    
                            </div>
                            
                        </div>
                        <div class="w-[230px]">
                            <p class="font-serif text-base text-gray-800">
                                Nomor Telepon :
                            </p>
                            <div class="place-self-end">
                                <input name="noHp" id="noHp" value=""
                                class="w-[220px] h-[40px] rounded-xl border-2 border-black px-4">    
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-between place-items-center mt-[10px]">
                        <div class="w-[245px]">
                            <p class="font-serif text-base text-gray-800">
                                Check-in Date :
                            </p>
                            <div class="">
                                <input type="date" name="checkin" id="checkin" value=""
                                class="w-[240px] h-[40px] rounded-xl border-2 border-black px-4">    
                            </div>
                            
                        </div>
                        <div class="w-[245px]">
                            <p class="font-serif text-base text-gray-800">
                                Check-out Date :
                            </p>
                            <div class="">
                                <input type="date" name="checkout" id="checkout" value=""
                                class="w-[240px] h-[40px] rounded-xl border-2 border-black px-4">    
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="grid bg-gray-300 mb-[20px] w-[550px] h-auto rounded-[25px]">
                <div class="m-[30px]">
                    
                    <div class="flex justify-between">
                        <div>
                            <h3 class="font-serif text-4xl">
                                Value-Added Services
                            </h3>

                            <p class="font-serif text-sm text-gray-500">
                                Tambahkan untuk meningkatkan nilai pengalaman selama menginap.
                            </p>
                        </div>

                        <div class="font-serif text-base place-self-center">
                            +$50.00
                        </div>
                    </div>

                    <div class="grid">

                        <div class="my-[10px]">
                            <div class="flex justify-between">
                                <div class="w-[245px]">
                                    <label class="flex bg-white w-[180px] h-[30px] rounded-[25px]">
                                        <input type="checkbox" name="" id="" class="mx-[20px]">
                                        <p class="font-serif text-lg place-self-center">
                                            Standar
                                        </p>
                                    </label>
                                    <div class="px-[10px]">
                                        <p class="font-serif text-sm">
                                            Lorem ipsum dolor sit amet, 
                                            consectetur adipiscing elit. 
                                            Aliquam dapibus, mi sit amet 
                                            pulvinar congue, purus erat 
                                            auctor metus, id.
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="w-[245px]">
                                    <label class="flex bg-white w-[180px] h-[30px] rounded-[25px]">
                                        <input type="checkbox" name="" id="" class="mx-[20px]">
                                        <p class="font-serif text-lg place-self-center">
                                            Elite
                                        </p>
                                    </label>
                                    <div class="px-[10px]">
                                        <p class="font-serif text-sm">
                                            Lorem ipsum dolor sit amet, 
                                            consectetur adipiscing elit. 
                                            Aliquam dapibus, mi sit amet 
                                            pulvinar congue, purus erat 
                                            auctor metus, id.
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    
                        <div class="my-[10px]">
                            <div class="flex justify-between">
                                <div class="w-[245px]">
                                    <label class="flex bg-white w-[180px] h-[30px] rounded-[25px]">
                                        <input type="checkbox" name="" id="" class="mx-[20px]">
                                        <p class="font-serif text-lg place-self-center">
                                            Premium
                                        </p>
                                    </label>
                                    <div class="px-[10px]">
                                        <p class="font-serif text-sm">
                                            Lorem ipsum dolor sit amet, 
                                            consectetur adipiscing elit. 
                                            Aliquam dapibus, mi sit amet 
                                            pulvinar congue, purus erat 
                                            auctor metus, id.
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="w-[245px]">
                                    <label class="flex bg-white w-[180px] h-[30px] rounded-[25px]">
                                        <input type="checkbox" name="" id="" class="mx-[20px]">
                                        <p class="font-serif text-lg place-self-center">
                                            Luxury
                                        </p>
                                    </label>
                                    <div class="px-[10px]">
                                        <p class="font-serif text-sm">
                                            Lorem ipsum dolor sit amet, 
                                            consectetur adipiscing elit. 
                                            Aliquam dapibus, mi sit amet 
                                            pulvinar congue, purus erat 
                                            auctor metus, id.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>

        </div>

        <div class="bg-gray-300 w-[350px] mb-[20px] rounded-[35px]">
            <div class="mx-[10px] my-[20px] border-b-2 border-black">
                <div class="grid place-self-center">
                    <p class="font-serif text-2xl text-center">
                        Double - #105
                    </p>
                    <img src="{{ asset('dummyImg.jpg') }}" alt="tcvygbh" class="w-[300px] h-[200px] py-[10px] rounded-[25px]">
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
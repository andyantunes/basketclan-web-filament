<footer class="w-full sm:py-6 py-8 flex flex-col sm:gap-4 gap-8 items-center bg-[#101010]">
    <section [hidden]="hideContent">
        <div class="w-full flex justify-between items-center sm:flex-row flex-col sm:gap-0 gap-8 xl:px-0 xl:w-[1200px]">
            <!-- Social Medias -->
            <section class="flex sm:justify-start">
                <!-- Facebook -->
                <a href="https://m.facebook.com/profile.php?id=100090089476171&mibextid=ZbWKwL" target="_blank">
                    <figure class="bg-[#323232] rounded-lg p-2 mr-3">
                        <img src="{{ asset('assets/icons/brand-facebook-gold.svg') }}" alt="Instagram" width="24"
                            height="24" />
                    </figure>
                </a>

                <!-- Instagram -->
                <a href="http://instagram.com/basketclan_ofc" target="_blank">
                    <figure class="bg-[#323232] rounded-lg p-2 mr-3">
                        <img src="{{ asset('assets/icons/brand-instagram-gold.svg') }}" alt="Instagram" width="24"
                            height="24" />
                    </figure>
                </a>

                <!-- TikTok -->
                <a href="http://tiktok.com/@basketclan_ofc" target="_blank">
                    <figure class="bg-[#323232] rounded-lg p-2 mr-3">
                        <img src="{{ asset('assets/icons/brand-tiktok-gold.svg') }}" alt="TikTok" width="24"
                            height="24" />
                    </figure>
                </a>

                <!-- Youtube -->
                <a href="https://youtube.com/@basketclan_ofc" target="_blank">
                    <figure class="bg-[#323232] rounded-lg p-2 mr-3">
                        <img src="{{ asset('assets/icons/brand-youtube-gold.svg') }}" alt="YouTube" width="24"
                            height="24" />
                    </figure>
                </a>
            </section>

            <section class="w-full sm:w-min h-full flex flex-col sm:justify-evenly items-center text-white text-right">
                <!-- Contacts -->
                <p class="font-bold flex gap-2">
                    <img src="{{ asset('assets/icons/mail-gold.svg') }}" alt="Email" width="24" height="24" />
                    <span class="font-normal">basketclan@outlook.com</span>
                </p>

                <!-- <p class="font-bold flex gap-2">
          <img src="{{ asset('assets/icons/mail-gold.svg') }}" alt="Mail" />
          <span class="font-normal">ssdevelopment@gmail.com</span>
        </p> -->
            </section>
        </div>

        <section class="flex justify-center text-white">
            <!-- Developers -->
            <small class="flex sm:flex-row flex-col items-center">
                <span>S.S. Development &copy; 2023</span>
                <span class="sm:inline hidden"> - </span>
                <span>Todos os direitos reservados</span>
            </small>
        </section>
    </section>
</footer>

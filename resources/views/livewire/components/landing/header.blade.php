<header class="flex justify-center w-full bg-[#101010] fixed z-10">
    <section class="px-7 xl:px-0 w-full xl:w-[1200px] sm:w-[400]">
        <section class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a>
                <figure class="logo">
                    <img src="{{ asset('assets/logo/logo.webp') }}" alt="BasketClan" width="70.33" height="50"
                        style="filter: drop-shadow(0px 0px 4px #ffffff)" />
                </figure>
            </a>

            <!-- Social Medias -->
            <section class="md:flex hidden sm:justify-start">
                <!-- Facebook -->
                <a href="https://m.facebook.com/profile.php?id=100090089476171&mibextid=ZbWKwL" target="_blank">
                    <figure class="rounded-lg p-2 mr-3">
                        <img src="{{ asset('assets/icons/brand-facebook-gold.svg') }}" alt="Instagram" width="24"
                            height="24" />
                    </figure>
                </a>

                <!-- Instagram -->
                <a href="http://instagram.com/basketclan_ofc" target="_blank">
                    <figure class="rounded-lg p-2 mr-3">
                        <img src="{{ asset('assets/icons/brand-instagram-gold.svg') }}" alt="Instagram" width="24"
                            height="24" />
                    </figure>
                </a>

                <!-- TikTok -->
                <a href="http://tiktok.com/@basketclan_ofc" target="_blank">
                    <figure class="rounded-lg p-2 mr-3">
                        <img src="{{ asset('assets/icons/brand-tiktok-gold.svg') }}" alt="TikTok" width="24"
                            height="24" />
                    </figure>
                </a>

                <!-- Youtube -->
                <a href="https://youtube.com/@basketclan_ofc" target="_blank">
                    <figure class="rounded-lg p-2 mr-3">
                        <img src="{{ asset('assets/icons/brand-youtube-gold.svg') }}" alt="YouTube" width="24"
                            height="24" />
                    </figure>
                </a>
            </section>

            <!-- Buttons -->
            <section class="gap-2 sm:flex hidden">
                <!-- Games -->
                <button
                    class="h-9 p-4 flex sm:flex justify-center items-center text-[1.125rem] text-zinc-300 m-2 rounded-md disabled:opacity-75">
                    <a href="#agenda"> Agenda </a>
                </button>

                <!-- Championships -->
                <button
                    class="h-9 p-4 flex sm:flex justify-center items-center text-[1.125rem] text-zinc-300 m-2 rounded-md disabled:opacity-75">
                    <a href="#campeonatos"> Campeonatos </a>
                </button>

                <!-- Team -->
                <button style="display: none"
                    class="relative h-9 p-4 px- flex sm:flex justify-center items-center text-[1.125rem] text-zinc-300 m-2 rounded-md disabled:opacity-75">
                    <a href="#team"> Equipe </a>
                    <img class="hidden absolute right-[3px] bottom-[3px]" src="{{ asset('assets/icons/lock.svg') }}"
                        alt="Lock" width="16" height="16" />
                </button>

                <!-- Supports -->
                <button
                    class="h-9 p-4 flex sm:flex justify-center items-center text-[1.125rem] text-zinc-300 m-2 rounded-md disabled:opacity-75">
                    <a href="#parceiros"> Parceiros </a>
                </button>

                <!-- Players -->
                <button
                    class="relative h-9 p-4 px- flex sm:flex justify-center items-center text-[1.125rem] text-zinc-300 m-2 rounded-md disabled:opacity-75">
                    <a href="#jogadores"> Elenco </a>
                    <img class="hidden absolute right-[3px] bottom-[3px]" src="{{ asset('assets/icons/lock.svg') }}"
                        alt="Lock" width="16" height="16" />
                </button>

                <!-- Login -->
                <button
                    class="min-w-[160px] h-9 p-4 ml-12 flex sm:flex justify-center items-center text-[1.125rem] text-white m-2 rounded-md bg-gradient-to-r from-[#fdbb2d] to-[#ac9549] disabled:opacity-75">
                    Área do Atleta
                </button>
            </section>

            <!-- Hamburguer Menu -->
            <div class="d-block sm:hidden">
                <button
                    class="h-9 m-2 p-4 ml-12 flex sm:flex justify-center items-center text-base text-white rounded-md bg-gradient-to-r from-[#fdbb2d] to-[#ac9549] disabled:opacity-75">
                    Área do Atleta
                </button>
                <!-- <button class="navbar-burger flex items-center p-3">
            <img
              class="h-8"
              src="{{ asset('assets/icons/menu.svg') }}"
              height="32px"
              alt="Menu Mobile"
            />
          </button> -->
            </div>
        </section>
    </section>
</header>

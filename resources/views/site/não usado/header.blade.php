<header class="bg-red-800/90 border-b-4 border-white backdrop-blur shadow-md sticky top-0 z-30">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <!-- Conteúdo do header -->
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = true" class="text-white text-xl focus:outline-none hover:scale-110 transition">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="{{ route('site.home') }}" class="text-white font-semibold text-base">
                    ETEC Zona Leste
                </a>
            </div>

            <!-- Centro: Navegação Desktop -->
            <nav class="hidden lg:flex items-center gap-x-4">
                <a href="{{ route('site.cursos') }}" class="px-3 py-1 text-white hover:bg-red-700 rounded-md transition"><i class="fas fa-graduation-cap mr-1"></i>Cursos</a>
                <a href="{{ route('site.departamentos') }}" class="px-3 py-1 text-white hover:bg-red-700 rounded-md transition"><i class="fas fa-building mr-1"></i>Departamentos</a>
                <a href="{{ route('site.contato') }}" class="px-3 py-1 text-white hover:bg-red-700 rounded-md transition"><i class="fas fa-envelope mr-1"></i>Contato</a>
            </nav>

            <!-- Direita: Ações -->
            <div class="flex items-center gap-4" x-data="{ open: false }">
                <button class="text-white hover:text-red-200 transition">
                    <i class="fas fa-search"></i>
                </button>
                <div class="relative">
                    <button @click="open = !open" class="text-white hover:text-red-200 focus:outline-none">
                        <i class="fas fa-user-circle text-2xl"></i>
                    </button>
                    <div x-show="open" @click.away="open = false"
                        x-transition
                        class="absolute right-0 mt-2 w-44 bg-white text-gray-800 rounded-md shadow-lg z-50 overflow-hidden">
                        @auth
                            <a href="{{ url('dashboard') }}" class="block px-4 py-2 hover:bg-gray-100">
                                <i class="fas fa-tachometer-alt text-red-600 mr-2"></i>Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-gray-100">
                                <i class="fas fa-sign-in-alt text-red-600 mr-2"></i>Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="block px-4 py-2 hover:bg-gray-100">
                                    <i class="fas fa-user-plus text-red-600 mr-2"></i>Registrar
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Sidebar Overlay -->
<div 
    class="fixed inset-0 bg-black bg-opacity-50 z-40 transition-opacity duration-300"
    x-show="sidebarOpen" 
    x-transition.opacity 
    @click="sidebarOpen = false"
    style="display: none;">
</div>

<!-- Sidebar -->
<aside 
    class="fixed top-0 left-0 w-64 h-full bg-red-800 shadow-lg z-50 transform transition-transform duration-300 sidebar-transition"
    x-show="sidebarOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    style="display: none;">
    <div class="p-4 flex justify-between items-center border-b">
        <span class="text-lg font-semibold text-white">Menu</span>
        <button @click="sidebarOpen = false" class="text-white hover:text-red-600">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <nav class="p-4 space-y-4">
        <a href="{{ route('site.home') }}" class="block text-white hover:text-red-600"><i class="fas fa-home mr-2"></i> Início</a>
        <a href="{{ route('site.cursos') }}" class="block text-white hover:text-red-600"><i class="fas fa-graduation-cap mr-2"></i> Cursos</a>
        <a href="{{ route('site.departamentos') }}" class="block text-white hover:text-red-600"><i class="fas fa-building mr-2"></i> Departamentos</a>
        <a href="{{ route('site.contato') }}" class="block text-white hover:text-red-600"><i class="fas fa-envelope mr-2"></i> Contato</a>
        <a href="{{ route('site.termos') }}" class="block text-white hover:text-red-600"><i class="fas fa-file-contract mr-2"></i> Termos de Serviço</a>
        <a href="{{ route('site.politica') }}" class="block text-white hover:text-red-600"><i class="fas fa-user-shield mr-2"></i> Política de Privacidade</a>
        <a href="{{ route('site.sobre') }}" class="block text-white hover:text-red-600"><i class="fas fa-info-circle mr-2"></i> Sobre Nós</a>
    </nav>
</aside>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos - ETEC Zona Leste</title>

    <!-- Dependências externas -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        .nav-link-hover:hover {
            color: #fff !important;
            background-color: rgba(220, 53, 69, 0.8);
            border-radius: 5px;
        }
        .course-card {
            transition: all 0.3s ease;
            border-left: 4px solid #dc3545;
        }
        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .bg-overlay {
            background: rgba(0, 0, 0, 0.4);
        }
        .course-badge {
            background-color: #f8d7da;
            color: #721c24;
        }
        .course-icon {
            background-color: #fee2e2;
            color: #dc3545;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col" x-data="{ sidebarOpen: false }">

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

    <!-- Header / Navbar -->
    <header class="bg-red-800/90 border-b-4 border-white backdrop-blur shadow-md sticky top-0 z-30">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = true" class="text-white text-xl focus:outline-none hover:scale-110 transition">
                        <i class="fas fa-bars"></i>
                    </button>
                    <a href="{{ route('site.home') }}" class="flex items-center gap-x-3">
                        <span class="text-white font-semibold hidden md:inline">ETEC Zona Leste</span>
                    </a>
                </div>

                <nav class="hidden lg:flex items-center gap-x-4">
                    <a href="{{ route('site.cursos') }}" class="px-3 py-1 text-white hover:bg-red-700 rounded-md transition"><i class="fas fa-graduation-cap mr-1"></i>Cursos</a>
                    <a href="{{ route('site.departamentos') }}" class="px-3 py-1 text-white hover:bg-red-700 rounded-md transition"><i class="fas fa-building mr-1"></i>Departamentos</a>
                    <a href="{{ route('site.contato') }}" class="px-3 py-1 text-white hover:bg-red-700 rounded-md transition"><i class="fas fa-envelope mr-1"></i>Contato</a>
                </nav>

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

    <!-- Main Content -->
    <main class="flex-1">
        <!-- Hero Banner -->
        <div class="relative">
            <img src="{{ asset('img/etec3.jpeg') }}" alt="ETEC Zona Leste" class="w-full h-64 md:h-80 object-cover">
            <div class="absolute inset-0 bg-overlay flex items-center justify-center">
                <h1 class="text-white text-3xl md:text-4xl font-bold text-center px-4">Seja nosso aluno!</h1>
            </div>
        </div>

        <!-- Courses Section -->
        <section class="py-12 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <h2 class="text-4xl font-bold text-red-700 mb-12 text-center">Nossos Cursos</h2>
                    
                    <!-- Technical Courses -->
                    <div class="mb-12">
                        <div class="bg-gray-50 rounded-lg p-6 course-card mb-6">
                            <div class="flex items-center mb-4">
                                <div class="course-icon p-3 rounded-full mr-4">
                                    <i class="fas fa-user-tie text-xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-red-700">Cursos Técnicos - Modalidade Presencial</h3>
                            </div>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="font-semibold text-lg text-red-800 mb-2 flex items-center">
                                        <i class="fas fa-briefcase mr-2 text-red-600"></i> Administração
                                    </h4>
                                    <p class="text-gray-600">Formação em gestão empresarial com duração de 18 meses.</p>
                                    <div class="mt-3">
                                        <span class="course-badge px-3 py-1 rounded-full text-sm mr-2">Período: Manhã/Tarde</span>
                                        <span class="course-badge px-3 py-1 rounded-full text-sm">Vagas: 40</span>
                                    </div>
                                </div>
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="font-semibold text-lg text-red-800 mb-2 flex items-center">
                                        <i class="fas fa-calculator mr-2 text-red-600"></i> Contabilidade
                                    </h4>
                                    <p class="text-gray-600">Formação em gestão financeira e contábil com duração de 18 meses.</p>
                                    <div class="mt-3">
                                        <span class="course-badge px-3 py-1 rounded-full text-sm mr-2">Período: Tarde</span>
                                        <span class="course-badge px-3 py-1 rounded-full text-sm">Vagas: 30</span>
                                    </div>
                                </div>
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="font-semibold text-lg text-red-800 mb-2 flex items-center">
                                        <i class="fas fa-laptop-code mr-2 text-red-600"></i> Desenvolvimento de Sistemas
                                    </h4>
                                    <p class="text-gray-600">Formação em programação e desenvolvimento de software com duração de 18 meses.</p>
                                    <div class="mt-3">
                                        <span class="course-badge px-3 py-1 rounded-full text-sm mr-2">Período: Manhã/Noite</span>
                                        <span class="course-badge px-3 py-1 rounded-full text-sm">Vagas: 35</span>
                                    </div>
                                </div>
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="font-semibold text-lg text-red-800 mb-2 flex items-center">
                                        <i class="fas fa-truck mr-2 text-red-600"></i> Logística
                                    </h4>
                                    <p class="text-gray-600">Formação em gestão de cadeia de suprimentos com duração de 18 meses.</p>
                                    <div class="mt-3">
                                        <span class="course-badge px-3 py-1 rounded-full text-sm mr-2">Período: Tarde/Noite</span>
                                        <span class="course-badge px-3 py-1 rounded-full text-sm">Vagas: 30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Integrated High School -->
                    <div class="mb-12">
                        <div class="bg-gray-50 rounded-lg p-6 course-card mb-6">
                            <div class="flex items-center mb-4">
                                <div class="course-icon p-3 rounded-full mr-4">
                                    <i class="fas fa-school text-xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-red-700">Ensino Médio Integrado ao Técnico (M-Tec)</h3>
                            </div>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="font-semibold text-lg text-red-800 mb-2 flex items-center">
                                        <i class="fas fa-briefcase mr-2 text-red-600"></i> Administração
                                    </h4>
                                    <p class="text-gray-600">Ensino médio integrado com formação técnica em administração.</p>
                                    <div class="mt-3">
                                        <span class="course-badge px-3 py-1 rounded-full text-sm mr-2">Período: Manhã</span>
                                        <span class="course-badge px-3 py-1 rounded-full text-sm">Duração: 3 anos</span>
                                    </div>
                                </div>
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="font-semibold text-lg text-red-800 mb-2 flex items-center">
                                        <i class="fas fa-laptop-code mr-2 text-red-600"></i> Desenvolvimento de Sistemas
                                    </h4>
                                    <p class="text-gray-600">Ensino médio integrado com formação técnica em programação.</p>
                                    <div class="mt-3">
                                        <span class="course-badge px-3 py-1 rounded-full text-sm mr-2">Período: Manhã</span>
                                        <span class="course-badge px-3 py-1 rounded-full text-sm">Duração: 3 anos</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Night Courses -->
                    <div class="mb-12">
                        <div class="bg-gray-50 rounded-lg p-6 course-card mb-6">
                            <div class="flex items-center mb-4">
                                <div class="course-icon p-3 rounded-full mr-4">
                                    <i class="fas fa-moon text-xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-red-700">Ensino Médio Integrado ao Técnico no Período Noturno (M-Tec-N)</h3>
                            </div>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="font-semibold text-lg text-red-800 mb-2 flex items-center">
                                        <i class="fas fa-truck mr-2 text-red-600"></i> Logística
                                    </h4>
                                    <p class="text-gray-600">Ensino médio noturno integrado com formação técnica em logística.</p>
                                    <div class="mt-3">
                                        <span class="course-badge px-3 py-1 rounded-full text-sm mr-2">Período: Noite</span>
                                        <span class="course-badge px-3 py-1 rounded-full text-sm">Duração: 3 anos</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- AMS Courses -->
                    <div>
                        <div class="bg-gray-50 rounded-lg p-6 course-card">
                            <div class="flex items-center mb-4">
                                <div class="course-icon p-3 rounded-full mr-4">
                                    <i class="fas fa-university text-xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-red-700">Articulação dos Ensinos Médio, Técnico e Superior (AMS)</h3>
                            </div>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="font-semibold text-lg text-red-800 mb-2 flex items-center">
                                        <i class="fas fa-laptop-code mr-2 text-red-600"></i> Desenvolvimento de Sistemas
                                    </h4>
                                    <p class="text-gray-600">Articulação entre ensino médio, técnico e possibilidade de continuidade no ensino superior.</p>
                                    <div class="mt-3">
                                        <span class="course-badge px-3 py-1 rounded-full text-sm mr-2">Período: Tarde</span>
                                        <span class="course-badge px-3 py-1 rounded-full text-sm">Duração: 3 anos</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    </div>
<footer class="bg-gray-900 text-white pt-12 pb-6">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            <div>
                <h4 class="text-lg font-bold mb-4 text-red-500">ETEC Zona Leste</h4>
                <p class="mb-2">Avenida Águia de Haia, 2.633</p>
                <p class="mb-2">Cidade AE Carvalho</p>
                <p class="mb-2">São Paulo/SP - CEP: 03694-000</p>
            </div>
            <div>
                <h4 class="text-lg font-bold mb-4 text-red-500">Contato</h4>
                <p class="mb-2"><i class="fas fa-phone-alt mr-2"></i> (11) 2045-4000</p>
                <p class="mb-2"><i class="fas fa-phone-alt mr-2"></i> (11) 2045-4016</p>
                <p class="mb-2"><i class="fas fa-envelope mr-2"></i> contato@eteczonaleste.com</p>
            </div>
            <div>
                <h4 class="text-lg font-bold mb-4 text-red-500">Horário</h4>
                <p class="mb-2">Segunda a Sexta</p>
                <p class="mb-2">Das 09h às 21h</p>
            </div>
            <div>
                <h4 class="text-lg font-bold mb-4 text-red-500">Redes Sociais</h4>
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-red-500 transition">
                        <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                    <a href="#" class="text-white hover:text-red-500 transition">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-white hover:text-red-500 transition">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-white hover:text-red-500 transition">
                        <i class="fab fa-youtube text-xl"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-800 pt-6 text-center text-gray-500">
            <p>&copy; 2025 ETEC Zona Leste. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>
</body>
</html>

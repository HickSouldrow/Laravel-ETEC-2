<!DOCTYPE html>
<html lang="pt-br">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Zona Leste - Portal do Estudante</title>

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
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
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
            <!-- Esquerda: logo + botão -->
            <div class="flex items-center gap-4">
                <!-- ✅ Botão Hamburguer SEM restrição de tela -->
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


    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden"></div>

    <!-- Main Content -->
    <main class="flex-1">
        <!-- Hero Carousel -->
        <div class="relative overflow-hidden">
            <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/etec.jpeg') }}" class="d-block w-100 h-96 object-cover" alt="ETEC Building">
                        <div class="carousel-caption d-none d-md-block bg-black bg-opacity-50 p-4 rounded-lg">
                            <h5 class="text-2xl font-bold">Conheça a Etec Zona Leste</h5>
                            <p>A principal escola técnica estadual da zona leste de São Paulo.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/etec2.jpeg') }}" class="d-block w-100 h-96 object-cover" alt="Classroom">
                        <div class="carousel-caption d-none d-md-block bg-black bg-opacity-50 p-4 rounded-lg">
                            <h5 class="text-2xl font-bold">Cursos Técnicos</h5>
                            <p>Oferecemos cursos técnicos em diversas áreas profissionais.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/etec3.jpeg') }}" class="d-block w-100 h-96 object-cover" alt="Auditorium">
                        <div class="carousel-caption d-none d-md-block bg-black bg-opacity-50 p-4 rounded-lg">
                            <h5 class="text-2xl font-bold">Nossa Infraestrutura</h5>
                            <p>Laboratórios modernos e espaços para aprendizado prático.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- About Section -->
        <section class="py-12 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-red-700 mb-4">Etec Zona Leste: Formando Profissionais</h2>
                    <div class="w-24 h-1 bg-red-600 mx-auto"></div>
                </div>
                <div class="max-w-4xl mx-auto text-gray-700">
                    <p class="mb-4">
                        Localizada estrategicamente na Avenida Águia de Haia, na Zona Leste de São Paulo, a Etec Zona Leste se destaca como um importante polo educacional na região.
                        Sua história remonta ao compromisso com a excelência educacional e o desenvolvimento profissional dos estudantes.
                    </p>
                    <p class="mb-4">
                        Fundada em 2008, a Etec Zona Leste rapidamente se estabeleceu como uma instituição de referência no ensino técnico e tecnológico. Desde o início, sua
                        missão foi proporcionar oportunidades de aprendizado que preparassem os alunos para os desafios do mercado de trabalho, além de incentivá-los
                        a buscar a excelência acadêmica.
                    </p>
                    <p class="mb-4">
                        Ao longo dos anos, a escola tem evoluído e se adaptado às demandas da sociedade e do mercado, ampliando sua oferta de cursos e modernizando suas instalações.
                        Com uma equipe dedicada de professores e funcionários, a Etec Zona Leste oferece uma variedade de cursos técnicos em áreas como informática, administração,
                        eletrônica, entre outros, proporcionando aos alunos uma formação sólida e atualizada.
                    </p>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-12 bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Cursos Card -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover transition duration-300">
                        <img src="{{ asset('img/etec.jpeg') }}" alt="Cursos" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-red-700 mb-3">Cursos</h3>
                            <p class="text-gray-600 mb-4">Saiba mais sobre os cursos oferecidos nesta unidade.</p>
                            <a href="{{route('site.cursos')}}" class="inline-block px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                Saiba Mais <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Departamentos Card -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover transition duration-300">
                        <img src="{{ asset('img/etec2.jpeg') }}" alt="Departamentos" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-red-700 mb-3">Departamentos</h3>
                            <p class="text-gray-600 mb-4">Conheça os departamentos da escola e entre em contato.</p>
                            <a href="{{route('site.departamentos')}}" class="inline-block px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                Saiba Mais <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Contato Card -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover transition duration-300">
                        <img src="{{ asset('img/etec3.jpeg') }}" alt="Contato" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-red-700 mb-3">Contato</h3>
                            <p class="text-gray-600 mb-4">Entre em contato com a Etec para esclarecer dúvidas.</p>
                            <a href="{{route('site.contato')}}" class="inline-block px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                Entrar em Contato <i class="fas fa-envelope ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Highlights Section -->
        <section class="py-12 bg-red-700 text-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold mb-4">Por que escolher a ETEC?</h2>
                    <div class="w-24 h-1 bg-white mx-auto"></div>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center p-6">
                        <div class="text-4xl mb-4">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Corpo Docente</h3>
                        <p>Professores altamente qualificados e com experiência de mercado.</p>
                    </div>
                    <div class="text-center p-6">
                        <div class="text-4xl mb-4">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Infraestrutura</h3>
                        <p>Laboratórios modernos e equipados com tecnologia de ponta.</p>
                    </div>
                    <div class="text-center p-6">
                        <div class="text-4xl mb-4">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Mercado de Trabalho</h3>
                        <p>Parcerias com empresas para estágios e oportunidades de emprego.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="py-12 bg-white">
            <div class="container mx-auto px-4">
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="border border-gray-200 rounded-lg p-6 hover:shadow-lg transition">
                        <h3 class="text-lg font-semibold text-red-700 mb-3 flex items-center">
                            <i class="fas fa-book mr-2"></i> Aulas e Materiais
                        </h3>
                        <p class="text-gray-600 mb-4">Acesse conteúdos exclusivos, apostilas digitais e materiais de apoio para potencializar seus estudos.</p>
                        <a href="#" class="text-red-600 font-semibold hover:underline flex items-center">
                            Saiba mais <i class="fas fa-arrow-right ml-1 text-sm"></i>
                        </a>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-6 hover:shadow-lg transition">
                        <h3 class="text-lg font-semibold text-red-700 mb-3 flex items-center">
                            <i class="fas fa-calendar-alt mr-2"></i> Eventos e Palestras
                        </h3>
                        <p class="text-gray-600 mb-4">Fique por dentro da agenda de palestras, workshops e eventos realizados na ETEC.</p>
                        <a href="#" class="text-red-600 font-semibold hover:underline flex items-center">
                            Saiba mais <i class="fas fa-arrow-right ml-1 text-sm"></i>
                        </a>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-6 hover:shadow-lg transition">
                        <h3 class="text-lg font-semibold text-red-700 mb-3 flex items-center">
                            <i class="fas fa-user-graduate mr-2"></i> Suporte ao Aluno
                        </h3>
                        <p class="text-gray-600 mb-4">Acompanhe seu desempenho, acesse serviços acadêmicos e tire suas dúvidas com nossa equipe.</p>
                        <a href="#" class="text-red-600 font-semibold hover:underline flex items-center">
                            Saiba mais <i class="fas fa-arrow-right ml-1 text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
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

    <script>
        // Mobile sidebar toggle
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const closeSidebarBtn = document.getElementById('close-sidebar');
        const mobileSidebar = document.getElementById('mobile-sidebar');
        const sidebarOverlay = document.getElementById('sidebar-overlay');

        hamburgerBtn.addEventListener('click', () => {
            mobileSidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
        });

        closeSidebarBtn.addEventListener('click', () => {
            mobileSidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });

        sidebarOverlay.addEventListener('click', () => {
            mobileSidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });

        // Initialize Bootstrap carousel
        const myCarousel = new bootstrap.Carousel(document.getElementById('heroCarousel'), {
            interval: 5000,
            wrap: true
        });
    </script>
</body>
</html>
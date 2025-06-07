<!DOCTYPE html>
<html lang="pt-br">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - ETEC Zona Leste</title>

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
        .contact-card {
            transition: all 0.3s ease;
        }
        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
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
                    <!-- Botão Hamburguer SEM restrição de tela -->
                    <button @click="sidebarOpen = true" class="text-white text-xl focus:outline-none hover:scale-110 transition">
                        <i class="fas fa-bars"></i>
                    </button>
                    <a href="{{ route('site.home') }}" class="flex items-center gap-x-3">
                        <span class="text-white font-semibold hidden md:inline">ETEC Zona Leste</span>
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

    <!-- Main Content -->
    <main class="flex-1">
        <!-- Hero Banner -->
        <div class="relative">
            <img src="{{ asset('img/etec2.jpeg') }}" alt="ETEC Zona Leste" class="w-full h-64 md:h-80 object-cover">
            <div class="absolute inset-0 bg-opacity-40 flex items-center justify-center">
                <h1 class="text-white text-3xl md:text-4xl font-bold">Fale Conosco</h1>
            </div>
        </div>

        <!-- Contact Information -->
        <section class="py-12 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- Contact Card -->
                        <div class="bg-gray-50 rounded-lg shadow-md p-6 contact-card">
                            <h2 class="text-2xl font-bold text-red-700 mb-6">Informações de Contato</h2>
                            
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="text-red-600 mr-4 mt-1">
                                        <i class="fas fa-map-marker-alt text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800">Endereço</h3>
                                        <p class="text-gray-600">Av. Águia de Haia, 2.633 - Cidade AE Carvalho, São Paulo - SP, 03694-000</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start">
                                    <div class="text-red-600 mr-4 mt-1">
                                        <i class="fas fa-phone-alt text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800">Telefone</h3>
                                        <p class="text-gray-600">(11) 2253-0325</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start">
                                    <div class="text-red-600 mr-4 mt-1">
                                        <i class="fas fa-envelope text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800">E-mail</h3>
                                        <p class="text-gray-600">dir.etezonaleste@centropaulasouza.sp.gov.br</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start">
                                    <div class="text-red-600 mr-4 mt-1">
                                        <i class="fas fa-clock text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800">Horário de Funcionamento</h3>
                                        <p class="text-gray-600">Segunda a Sexta: 08h às 21h</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Form -->
                        <div class="bg-gray-50 rounded-lg shadow-md p-6 contact-card">
                            <h2 class="text-2xl font-bold text-red-700 mb-6">Envie uma Mensagem</h2>
                            
                            <form class="space-y-4">
                                <div>
                                    <label for="name" class="block text-gray-700 font-medium mb-1">Nome</label>
                                    <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-gray-700 font-medium mb-1">E-mail</label>
                                    <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                                </div>
                                
                                <div>
                                    <label for="subject" class="block text-gray-700 font-medium mb-1">Assunto</label>
                                    <select id="subject" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                                        <option value="">Selecione um assunto</option>
                                        <option value="admission">Processo Seletivo</option>
                                        <option value="courses">Informações sobre Cursos</option>
                                        <option value="complaint">Reclamação</option>
                                        <option value="suggestion">Sugestão</option>
                                        <option value="other">Outro</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="message" class="block text-gray-700 font-medium mb-1">Mensagem</label>
                                    <textarea id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
                                </div>
                                
                                <button type="submit" class="w-full bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition duration-300 font-medium">
                                    Enviar Mensagem
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Map Section -->
                    <div class="mt-12 bg-gray-50 rounded-lg shadow-md overflow-hidden contact-card">
                        <h2 class="text-2xl font-bold text-red-700 mb-6 p-6 pb-0">Localização</h2>
                        <div class="h-80 w-full">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.122569257633!2d-46.5293749246054!3d-23.52794397882762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5e45de28bb23%3A0x1d2ed3122aae28a7!2sEscola%20T%C3%A9cnica%20Estadual%20-%20ETEC%20Zona%20Leste!5e0!3m2!1spt-BR!2sbr!4v1712345678901" 
                                width="100%" 
                                height="100%" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
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
</body>
</html>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamentos | ETEC Zona Leste</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-red-400 min-h-screen flex flex-col">
    <header class="bg-gray-800 border-b-4 border-red-700 sticky top-0 z-50 mb-20">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('site.home') }}" class="flex items-center gap-2">
                <img src="{{ asset('img/etec-logo.png') }}" alt="ETEC Logo" class="h-8">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-emerald-400 font-bold text-xl">ETEC ZL</span>
            </a>
            <nav class="hidden md:flex gap-6">
                <a href="{{ route('site.cursos') }}" class="relative group font-medium">Cursos</a>
                <a href="{{ route('site.departamentos') }}" class="relative group font-medium">Departamentos</a>
                <a href="{{ route('site.contato') }}" class="relative group font-medium">Contato</a>
            </nav>
        </div>
    </header>

    <section class="relative h-[80vh] min-h-[400px] flex items-center overflow-hidden mt-10">
        <img src="{{ asset('img/etec.jpeg') }}" alt="ETEC" class="absolute inset-0 w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/70 to-transparent"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 bg-gradient-to-r from-gray-100 to-red-400 bg-clip-text text-transparent">
                Conheça Nossos Departamentos
            </h1>
        </div>
    </section>

    <main class="container mx-auto px-4 py-12 grid gap-8 max-w-6xl mb-12">
        <div class="grid md:grid-cols-2 gap-6">
            <div class="p-6 bg-gray-800 rounded-lg shadow-lg hover:shadow-red-700">
                <h2 class="text-2xl font-semibold text-red-400">Departamento de Informática</h2>
                <p class="text-gray-300">Cursos de TI, desenvolvimento de software e infraestrutura de redes.</p>
            </div>
            <div class="p-6 bg-gray-800 rounded-lg shadow-lg hover:shadow-red-700">
                <h2 class="text-2xl font-semibold text-red-400">Departamento de Administração</h2>
                <p class="text-gray-300">Gestão empresarial, contabilidade e planejamento estratégico.</p>
            </div>
            <div class="p-6 bg-gray-800 rounded-lg shadow-lg hover:shadow-red-700">
                <h2 class="text-2xl font-semibold text-red-400">Departamento de Recursos Humanos</h2>
                <p class="text-gray-300">Recrutamento, seleção e desenvolvimento de talentos.</p>
            </div>
            <div class="p-6 bg-gray-800 rounded-lg shadow-lg hover:shadow-red-700">
                <h2 class="text-2xl font-semibold text-red-400">Departamento de Comunicação</h2>
                <p class="text-gray-300">Marketing, publicidade e relações públicas.</p>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 border-t-4 border-red-700 mt-auto py-12 text-center">
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8 text-sm">
            <div>
                <h3 class="font-semibold text-red-500 mb-2">Contato</h3>
                <p>Endereço: Rua Exemplo, 123 - São Paulo, SP</p>
                <p>Email: contato@eteczl.com</p>
                <p>Telefone: (11) 1234-5678</p>
            </div>
            <div>
                <h3 class="font-semibold text-red-500 mb-2">Links Úteis</h3>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:text-red-300">Sobre Nós</a></li>
                    <li><a href="#" class="hover:text-red-300">Cursos</a></li>
                    <li><a href="#" class="hover:text-red-300">Departamentos</a></li>
                    <li><a href="#" class="hover:text-red-300">Política de Privacidade</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold text-red-500 mb-2">Redes Sociais</h3>
                <div class="flex gap-4 justify-center md:justify-start">
                    <a href="#" class="hover:text-red-300">Facebook</a>
                    <a href="#" class="hover:text-red-300">Instagram</a>
                    <a href="#" class="hover:text-red-300">LinkedIn</a>
                </div>
            </div>
        </div>
        <div class="mt-8 border-t border-red-600 pt-4">
            <p class="text-sm text-red-700">© 2025 ETEC Zona Leste - Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>

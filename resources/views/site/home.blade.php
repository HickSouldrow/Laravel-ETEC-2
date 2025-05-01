<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Zona Leste</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-red-400 min-h-screen flex flex-col">
    <header class="bg-gray-800 border-b-4 border-red-700 sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="#" class="flex items-center gap-2">
                <img src="{{ asset('img/etec-logo.png') }}" alt="ETEC Logo" class="h-8">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-emerald-400 font-bold text-xl">ETEC ZL</span>
            </a>
            <nav class="hidden md:flex gap-6 ">
                <a href="{{ route('site.cursos') }}" class="relative group font-medium">Cursos</a>
                <a href="{{ route('site.departamentos') }}" class="relative group font-medium">Departamentos</a>
                <a href="{{ route('site.contato') }}" class="relative group font-medium">Contato</a>
            </nav>
        </div>
    </header>

    <section class="relative h-[80vh] min-h-[500px] flex items-center overflow-hidden">
        <img src="{{ asset('img/etec-logo.png') }}" alt="Estudantes" class="absolute inset-0 w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/70 to-transparent"></div>
        <div class="container mx-auto px-4 relative z-10">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 bg-gradient-to-r from-gray-100 to-red-400 bg-clip-text text-transparent">
                Transformando vidas através da educação
            </h1>
            <p class="text-lg md:text-xl max-w-2xl mb-8 opacity-90">
                Na ETEC Zona Leste, oferecemos educação técnica de qualidade com foco no mercado de trabalho e formação cidadã.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('site.cursos') }}"class="px-8 py-3 bg-gradient-to-r from-red-600 to-red-600  border-red-600 rounded-full font-semibold hover:shadow-lg hover:shadow-red-700 transition-all">Nossos Cursos</a>
                <a href="{{ route('site.contato') }}" class="px-8 py-3 border border-red-600 rounded-full font-semibold text-red-700 hover:bg-red-700 transition">Fale Conosco</a>
            </div>
        </div>
    </section>

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

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', () => {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>

    <div id="mobile-menu" class="hidden fixed inset-0 bg-black bg-opacity-90 z-40 flex flex-col items-center justify-center space-y-6 text-2xl">
        <a href="{{ route('site.cursos') }}"class="text-red-400">Cursos</a>
        <a href="{{ route('site.departamentos') }}" class="text-red-400">Departamentos</a>
        <a href="{{ route('site.contato') }}"class="text-red-400">Contato</a>
        <button id="close-menu" class="text-4xl text-red-600">×</button>
    </div>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
        document.getElementById('close-menu').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.add('hidden');
        });
    </script>
</body>
</html>

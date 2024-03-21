<script setup>
import { Head, Link } from '@inertiajs/vue3';


</script>

<template>

    <Head title="My Portfolio" />
    <div class="font-sans leading-normal tracking-normal bg-gray-900">
        <!-- Navbar -->
        <nav class="bg-gray-800 p-4">
            <div class="container mx-auto flex justify-between items-center">
                <a href="#" class="text-white font-bold text-xl">Your Name</a>
                <ul class="flex">
                    <li class="mr-6"><a href="#about" class="text-white hover:text-gray-400">About</a></li>
                    <li class="mr-6"><a href="#skills" class="text-white hover:text-gray-400">Skills</a></li>
                    <li class="mr-6"><a href="#projects" class="text-white hover:text-gray-400">Projects</a></li>
                    <li><a href="#contact" class="text-white hover:text-gray-400">Contact</a></li>
                </ul>
            </div>
        </nav>

        <!-- Hero Section -->
        <header class="hero-bg h-screen flex items-center justify-center text-white">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-4 animate__animated animate__fadeInDown">Welcome to My
                    Portfolio</h1>
                <p class="text-lg md:text-xl animate__animated animate__fadeInUp">I'm a passionate developer ready to
                    create amazing things.</p>
            </div>
        </header>

        <!-- About Section -->
        <section id="about" class="py-16 bg-gray-800 text-white">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold mb-8">About Me</h2>
                <p class="text-lg">I'm a skilled developer with a strong background in web development. I specialize in
                    building responsive and user-friendly web applications.</p>
            </div>
        </section>

        <!-- Skills Section -->
        <section id="skills" class="py-16 bg-gray-900 text-white">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold mb-8">My Skills</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="p-4 bg-gray-800 rounded-lg shadow-lg text-white">HTML/CSS</div>
                    <div class="p-4 bg-gray-800 rounded-lg shadow-lg text-white">JavaScript</div>
                    <div class="p-4 bg-gray-800 rounded-lg shadow-lg text-white">React.js</div>
                    <div class="p-4 bg-gray-800 rounded-lg shadow-lg text-white">Node.js</div>
                    <div class="p-4 bg-gray-800 rounded-lg shadow-lg text-white">Express.js</div>
                    <div class="p-4 bg-gray-800 rounded-lg shadow-lg text-white">MongoDB</div>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="py-16 bg-gray-800 text-white">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold mb-8">My Projects</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg">
                        <img src="https://via.placeholder.com/500" alt="Project" class="w-full">
                        <div class="p-4">
                            <h3 class="text-xl font-bold mb-2">Project Title</h3>
                            <p class="text-gray-300">Project description goes here.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="bg-gray-900 py-16 text-white">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold mb-8">Contact Me</h2>
                <p class="text-lg">Feel free to reach out to me through the following channels:</p>
                <ul class="mt-4">
                    <li>Email: your.email@example.com</li>
                    <li>Phone: +1234567890</li>
                </ul>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white text-center py-4">
            &copy; 2024 Your Portfolio. All rights reserved To Md Ismail Hossain | Designed with Love
        </footer>
    </div>

</template>

<style scoped>
/* Additional custom styles */
/* Hero Section */
.hero-bg {
    background-image: url('https://source.unsplash.com/1600x900/?coding,technology');
    background-size: cover;
    background-position: center;
}

/* Footer */
footer a:hover {
    color: #4b5563;
}
</style>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import ContactForm from "@/Components/ContactForm.vue";
import Footer from "@/Components/Footer.vue";
import Timeline from "@/Components/Timeline.vue";

components: {

}
</script>

<template>
    <Head title="My Portfolio" />
    <div class="bg-gray-100 text-gray-900">
        <nav class="bg-white shadow-lg fixed w-full z-10">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <a href="#hero" class="text-xl font-bold">Dr. Jane Doe</a>
            <div class="hidden md:flex">
                <a href="#education" class="mx-2 lg:mx-4 text-gray-700 hover:text-gray-900">Education</a>
                <a href="#experience" class="mx-2 lg:mx-4 text-gray-700 hover:text-gray-900">Experience</a>
                <a href="#publications" class="mx-2 lg:mx-4 text-gray-700 hover:text-gray-900">Publications</a>
                <a href="#skills" class="mx-2 lg:mx-4 text-gray-700 hover:text-gray-900">Skills</a>
            </div>
            <div class="md:hidden">
                <button id="menu-toggle" class="text-gray-700 hover:text-gray-900 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg">
            <a href="#education" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Education</a>
            <a href="#experience" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Experience</a>
            <a href="#publications" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Publications</a>
            <a href="#skills" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Skills</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="relative">
        <img src="https://via.placeholder.com/1920x600" alt="Hero Image" class="w-full h-64 md:h-96 object-cover">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
            <div class="text-center text-white">
                <h1 class="text-3xl md:text-5xl font-bold">Dr. Jane Doe</h1>
                <p class="text-lg md:text-xl mt-2">Professor of Computer Science</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container mx-auto p-4 md:p-8 bg-white shadow-lg mt-8 md:mt-20">
        <!-- Header -->
        <header id="header" class="mb-8">
            <div class="md:flex justify-between items-center">
                <div>
                    <h1 class="text-2xl md:text-4xl font-bold">Dr. Jane Doe</h1>
                    <p class="text-lg text-gray-700">Professor of Computer Science</p>
                </div>
                <div class="text-right mt-4 md:mt-0">
                    <p class="text-gray-700">Email: jane.doe@example.com</p>
                    <p class="text-gray-700">Phone: (123) 456-7890</p>
                    <p class="text-gray-700">Website: www.janedoe.com</p>
                </div>
            </div>
        </header>

        <!-- Education -->
        <section id="education" class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Education</h2>
            <ul class="list-none">
                <li class="mb-4">
                    <div class="md:flex justify-between">
                        <div>
                            <h3 class="text-xl font-semibold">Ph.D. in Computer Science</h3>
                            <p class="text-gray-700">University of Example, 2015</p>
                        </div>
                        <span class="text-gray-700 mt-2 md:mt-0">2010 - 2015</span>
                    </div>
                </li>
                <li class="mb-4">
                    <div class="md:flex justify-between">
                        <div>
                            <h3 class="text-xl font-semibold">M.Sc. in Computer Science</h3>
                            <p class="text-gray-700">University of Example, 2010</p>
                        </div>
                        <span class="text-gray-700 mt-2 md:mt-0">2008 - 2010</span>
                    </div>
                </li>
                <li class="mb-4">
                    <div class="md:flex justify-between">
                        <div>
                            <h3 class="text-xl font-semibold">B.Sc. in Computer Science</h3>
                            <p class="text-gray-700">University of Example, 2008</p>
                        </div>
                        <span class="text-gray-700 mt-2 md:mt-0">2004 - 2008</span>
                    </div>
                </li>
            </ul>
        </section>

        <!-- Experience -->
        <section id="experience" class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Experience</h2>
            <ul class="list-none">
                <li class="mb-4">
                    <div class="md:flex justify-between">
                        <div>
                            <h3 class="text-xl font-semibold">Professor of Computer Science</h3>
                            <p class="text-gray-700">University of Example</p>
                        </div>
                        <span class="text-gray-700 mt-2 md:mt-0">2018 - Present</span>
                    </div>
                    <p class="text-gray-600 mt-2">Description of responsibilities and achievements in this role.</p>
                </li>
                <li class="mb-4">
                    <div class="md:flex justify-between">
                        <div>
                            <h3 class="text-xl font-semibold">Associate Professor</h3>
                            <p class="text-gray-700">University of Example</p>
                        </div>
                        <span class="text-gray-700 mt-2 md:mt-0">2015 - 2018</span>
                    </div>
                    <p class="text-gray-600 mt-2">Description of responsibilities and achievements in this role.</p>
                </li>
            </ul>
        </section>

        <!-- Publications -->
        <section id="publications" class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Publications</h2>
            <ul class="list-none">
                <li class="mb-4">
                    <h3 class="text-xl font-semibold">Title of Paper</h3>
                    <p class="text-gray-700">Journal Name, Year</p>
                </li>
                <li class="mb-4">
                    <h3 class="text-xl font-semibold">Title of Paper</h3>
                    <p class="text-gray-700">Journal Name, Year</p>
                </li>
            </ul>
        </section>

        <!-- Skills -->
        <section id="skills" class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Skills</h2>
            <ul class="list-disc list-inside text-gray-700">
                <li>Programming Languages: Python, Java, C++</li>
                <li>Data Analysis and Visualization</li>
                <li>Machine Learning and Artificial Intelligence</li>
                <li>Research and Academic Writing</li>
            </ul>
        </section>

        <!-- Footer -->
        <footer class="mt-8">
            <p class="text-center text-gray-600">&copy; 2024 Dr. Jane Doe. All rights reserved.</p>
        </footer>
    </div>

    </div>
</template>


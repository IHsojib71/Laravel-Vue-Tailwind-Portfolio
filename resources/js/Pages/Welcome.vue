

<template>
    <Head title="My Portfolio" />
    <div class="bg-gray-100 text-gray-900">
        <nav class="bg-white shadow-lg fixed w-full z-10">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <a href="#hero" class="text-xl font-bold">{{ basicInformations ? basicInformations.name : 'No Name' }}</a>
            <div class="hidden md:flex">
                <a href="#education" class="mx-2 lg:mx-4 text-gray-700 hover:text-gray-900">Education</a>
                <a href="#experience" class="mx-2 lg:mx-4 text-gray-700 hover:text-gray-900">Experience</a>
                <a href="#publications" class="mx-2 lg:mx-4 text-gray-700 hover:text-gray-900">Publications</a>
                <a href="#skills" class="mx-2 lg:mx-4 text-gray-700 hover:text-gray-900">Skills</a>
                <a href="#tests" class="mx-2 lg:mx-4 text-gray-700 hover:text-gray-900">Tests</a>
                <a href="#projects" class="mx-2 lg:mx-4 text-gray-700 hover:text-gray-900">Projects</a>
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
            <a href="#skills" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Tests</a>
            <a href="#projects" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Projects</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="relative">
        <img src="https://via.placeholder.com/1920x600" alt="Hero Image" class="w-full h-64 md:h-96 object-cover">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
            <div class="text-center text-white">
                <h1 class="text-3xl md:text-5xl font-bold">{{ basicInformations ? basicInformations.name : 'No Name' }}</h1>
                <p class="text-lg md:text-xl mt-2">{{ basicInformations ? basicInformations.site_sub_title : 'No sub title' }}</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container mx-auto p-4 md:p-8 bg-white rounded-2xl shadow-lg mt-2 md:mt-10">
        <!-- Header -->
        <header id="header" class="mb-8">
            <div class="md:flex justify-between items-center">
                <div>
                    <h1 class="text-2xl md:text-6xl font-bold">{{ basicInformations ? basicInformations.name : 'No Name' }}</h1>
                    <p class="text-lg text-gray-700">{{ basicInformations ? basicInformations.site_sub_title : 'No sub title' }}</p>
                </div>
                <div class="text-right mt-4 md:mt-0">
                    <p class="text-gray-700">Email: {{  basicInformations ? basicInformations.email : 'No email' }}</p>
                    <p class="text-gray-700">Phone: {{ basicInformations ? basicInformations.phone : 'No phone' }}</p>
                    <p class="text-gray-700">
                    </p>

                </div>
            </div>
        </header>
        <hr class="mb-4">
        <!-- Education -->
        <section id="education" class="mb-8">
            <h2 class="text-4xl font-semibold mb-4">Education</h2>
            <ul class="list-none">
                <li class="mb-4" v-for="(education, index) in educations" :key="index">
                    <div class="md:flex justify-between">
                        <div>
                            <h3 class="text-xl font-bold">{{ education.course_name }}</h3>
                            <p class="text-gray-700 font-bold">Result : {{ education.result }}</p>
                            <p class="text-gray-700">{{ education.institute }}</p>
                            <p class="font-semibold">Passing Year :{{ education.passing_year }}</p>
                        </div>
                        <span class="text-gray-700 mt-2 md:mt-0">Duration : {{ education.course_duration }}</span>
                    </div>
                    <hr class="my-2">
                </li>

            </ul>
        </section>


        <!-- Experience -->
        <section id="experience" class="mb-8">
            <h2 class="text-4xl font-semibold mb-4">Experience</h2>
            <ul class="list-none">
                <li class="mb-4" v-for="(experience,index) in experiences" :key="index">
                    <div class="md:flex justify-between">
                        <div>
                            <h3 class="text-xl font-semibold">{{ experience.role }}</h3>
                            <p class="text-gray-700">{{ experience.organization }}</p>
                        </div>
                        <span class="text-gray-700 mt-2 md:mt-0">{{ experience.formatted_start_date }} - {{ experience.formatted_end_date }}</span>
                    </div>
                    <p class="text-gray-600 mt-2">Milestones : {{ experience.milestones }}</p>

                    <blockquote class="border-l-4 border-gray-200 pl-4 italic">{{ experience.note }}</blockquote>

                    <hr class="my-2">
                </li>
            </ul>
        </section>
        <!-- Publications -->
        <section id="publications" class="mb-8">
            <h2 class="text-4xl font-semibold mb-4">Publications/Researches</h2>
            <ul class="list-none">
                <li class="mb-4" v-for="(research,index) in researches" :key="index">
                    <h3 class="text-xl font-semibold">{{ research.title }}</h3>
                    <p class="text-gray-700">{{ research.sub_title }}</p>
                    <p>{{ research.teachers }}</p>
                    <p class="text-justify italic border-l-4 border-gray-200">{{ research.description }}</p>
                    <br>
                    <a class="bg-black text-white p-2 rounded-xl mt-4" target="_blank" href="{{ research.link }}">Click To Visit</a>
                    <br>
                    <hr class="my-4">
                </li>

            </ul>
        </section>

        <!-- Skills -->
        <section id="skills" class="mb-8">
            <h2 class="text-4xl font-semibold mb-4">Skills</h2>
            <ul class="list-disc list-inside text-gray-700">
                <li><span class="font-bold">Programming Languages:</span> {{ skills.languages ? skills.languages : 'N/A'}}</li>
                <li><span class="font-bold">Frameworks:</span> {{ skills.frameworks ? skills.frameworks : 'N/A' }}</li>
                <li><span class="font-bold">Softwares:</span> {{ skills.softwares ? skills.softwares : 'N/A'   }}</li>
                <li><span class="font-bold">Operating Systems:</span> {{ skills.operating_systems ? skills.operating_systems : 'N/A' }}</li>
                <li><span class="font-bold">Others:</span> {{ skills.extra ? skills.extra : 'N/A'   }}</li>
            </ul>
        </section>
        <hr class="my-4">
         <!-- Special Tests -->
         <section id="tests" class="mb-8">
            <h2 class="text-4xl font-semibold mb-4">Special Tests</h2>
            <ul class="list-none">
                <li class="mb-4" v-for="(test, index) in tests" :key="index">
                    <div class="md:flex justify-between">
                        <div>
                            <h3 class="text-xl font-bold">{{ test.topic }}</h3>
                            <p class="text-gray-700">Result : {{ test.result }}</p>

                            <p class="text-gray-700">Description :{{ test.description }}</p>
                        </div>

                    </div>
                    <hr class="my-2">
                </li>

            </ul>
        </section>

        <section class="py-6" id="projects">
            <h2 class="text-4xl font-semibold mb-4">Projects</h2>

	<div class="container flex flex-col justify-center p-4 mx-auto">

        <div class="grid grid-cols-1 gap-4 lg:grid-cols-4 sm:grid-cols-2">
			<div class="object-cover w-full border-2 rounded-2xl p-4" v-for="(project,index) in projects" :key="index">
            <img :src="'/'+project.image" alt="" class="w-[300px] mx-auto">
            <p class="text-xl font-bold">{{ project.title }}</p>
            <p>{{ project.duration }}</p>
            <p class="text-wrap text-justify">{{ project.description }}</p>
            <div class="flex justify-between my-2">
                <a :href="project.github" class="text-blue-500">Github</a>
                <a :href="project.live" class="text-blue-500">Live</a>
            </div>
         </div>

		</div>
	</div>
</section>

        <!-- Footer -->
        <footer class="mt-8">
            <p class="text-center text-gray-600">&copy; 2024 Dr. Jane Doe. All rights reserved.</p>
        </footer>
    </div>

    </div>
</template>

<script>
export default {
    props: {
    basicInformations : Object,
    educations : Array,
    experiences : Array,
    researches : Array,
    tests : Array,
    projects : Array,
    skills : Object,
    acheivements : Array,
    certifications : Array,
    }
}


</script>


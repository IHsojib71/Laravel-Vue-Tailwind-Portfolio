

<template>
    <Head :title="basicInformations.name" />
    <div class="bg-gray-100 text-gray-900">
        <nav class="bg-white shadow-lg fixed w-full z-10">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <a href="/" class="text-xl font-bold">{{ basicInformations ? basicInformations.name : 'No Name' }}</a>
            <div class="hidden md:flex">
                <a href="#education" class="mx-2 lg:mx-4 text-gray-700 hover:text-gray-900">Education</a>
                <a href="#experience" class="mx-2 lg:mx-4 text-gray-700 hover:text-gray-900">Experience</a>
                <a href="#publications" class="mx-2 lg:mx-4 text-gray-700 hover:text-gray-900">Publications</a>
                <a href="#skills" class="mx-2 lg:mx-4 text-gray-700 hover:text-gray-900">Skills</a>
                <a href="#tests" class="mx-2 lg:mx-4 text-gray-700 hover:text-gray-900">Tests</a>
                <a href="#projects" class="mx-2 lg:mx-4 text-gray-700 hover:text-gray-900">Projects</a>
                <a href="#certifications" class="mx-2 lg:mx-4 text-gray-700 hover:text-gray-900">Certifications</a>
                <a href="#acheivements" class="mx-2 lg:mx-4 text-gray-700 hover:text-gray-900">Acheivements</a>
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
            <a href="#certifications" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Certifications</a>
            <a href="#acheivements" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Acheivements</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="relative">
        <img :src="basicInformations.image" alt="Hero Image" class="w-full h-64 md:h-96 object-cover">
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
                    <p class="text-gray-700"><font-awesome-icon icon="envelope" /> Email: {{  basicInformations ? basicInformations.email : 'No email' }}</p>
                    <p class="text-gray-700"><font-awesome-icon icon="phone-volume" /> Phone: {{ basicInformations ? basicInformations.phone : 'No phone' }}</p>

                    <div class="flex space-x-4">
                        <a :href="basicInformations.github" target="_blank">
                            <font-awesome-icon icon="github" /><span class="text-blue-500">Github</span></a>
                        <a :href="basicInformations.linkedin" target="_blank">
                        <span class="text-blue-500"><font-awesome-icon icon="linkedin" />Linkedin</span></a>
                        <a :href="basicInformations.twitter" target="_blank">
                     <span class="text-blue-500">Twitter</span></a>
                    </div>


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
                    <a class="text-blue-500 p-2 rounded-xl mt-4" target="_blank" href="{{ research.link }}">Click To Visit</a>
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
<!-- projects -->
        <section class="py-6" id="projects">
            <h2 class="text-4xl font-semibold mb-4">Projects</h2>

	<div class="container flex flex-col justify-center p-4 mx-auto">

        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 sm:grid-cols-2">
			<div class="object-cover w-full border-2 rounded-2xl p-4" v-for="(project,index) in projects" :key="index">
            <img :src="'/'+project.image" alt="" class="w-[300px] mx-auto">
            <p class="text-xl font-bold">{{ project.title }}</p>
            <p>{{ project.duration }}</p>
            <p class="text-wrap text-justify">{{ project.description }}</p>
            <div class="flex justify-between my-2">
                <a :href="project.github" class="text-blue-500" target="_blank">Github</a>
                <a :href="project.live" class="text-blue-500" target="_blank">Live</a>
            </div>
         </div>

		</div>
	</div>
</section>

<!-- Certifications -->

<section class="py-6" id="certifications">
            <h2 class="text-4xl font-semibold mb-4">Certifications</h2>

	<div class="container flex flex-col justify-center p-4 mx-auto">

        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 sm:grid-cols-2">
			<div class="object-cover w-full border-2 rounded-2xl p-4" v-for="(certificate,index) in certifications" :key="index">
                <div class="container flex flex-col items-center p-4 mx-auto space-y-6 md:p-8">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="w-16 h-16 dark:text-violet-600">
			<polygon points="328.375 384 332.073 458.999 256.211 406.28 179.924 459.049 183.625 384 151.586 384 146.064 496 182.756 496 256.169 445.22 329.242 496 365.936 496 360.414 384 328.375 384"></polygon>
			<path d="M415.409,154.914l-2.194-48.054L372.7,80.933,346.768,40.414l-48.055-2.2L256,16.093,213.287,38.219l-48.055,2.2L139.3,80.933,98.785,106.86l-2.194,48.054L74.464,197.628l22.127,42.715,2.2,48.053L139.3,314.323l25.928,40.52,48.055,2.195L256,379.164l42.713-22.126,48.055-2.195,25.928-40.52L413.214,288.4l2.195-48.053,22.127-42.715Zm-31.646,76.949L382,270.377l-32.475,20.78-20.78,32.475-38.515,1.76L256,343.125l-34.234-17.733-38.515-1.76-20.78-32.475L130,270.377l-1.759-38.514L110.5,197.628,128.237,163.4,130,124.88,162.471,104.1l20.78-32.474,38.515-1.76L256,52.132l34.234,17.733,38.515,1.76,20.78,32.474L382,124.88l1.759,38.515L401.5,197.628Z"></path>
		</svg>
		<p class="text-2xl font-semibold text-center sm:font-bold sm:text-3xl md:text-4xl lg:max-w-2xl xl:max-w-4xl dark:text-gray-700">{{ certificate.title }}</p>
        <p class="text-center">{{ certificate.issue_date }}</p>

		<div class="flex justify-center space-x-3">

			<div class="text-center">
                <p class="text-justify italic">{{ certificate.description }}</p>
				<a class="py-2 space-x-1 text-sm text-blue-500" :href="certificate.link">
					<span>View Certificate</span>

				</a>
			</div>
		</div>
	</div>
            </div>
         </div>

		</div>

</section>

<!-- Acheivements -->
<section class="" id="acheivements">
    <h2 class="text-4xl font-semibold mb-4">Acheivements</h2>
	<div class="py-12 mx-auto border-2 rounded-2xl">
		<div class="grid gap-4 mx-4 sm:grid-cols-12">
			<div class="col-span-12 sm:col-span-3">
				<div class="text-center sm:text-left mb-14 before:block before:w-24 before:h-3 before:mb-5 before:rounded-md before:mx-auto sm:before:mx-0 before:dark:bg-violet-600">
					<h3 class="text-3xl font-semibold">My Acheivements</h3>
					<span class="text-sm font-bold tracking-wider uppercase dark:text-gray-600">Check my acheivements here</span>
				</div>
			</div>
			<div class="relative col-span-12 px-4 space-y-6 sm:col-span-9">
				    <div class="col-span-12 space-y-12 relative px-4 sm:col-span-8 sm:space-y-8 sm:before:absolute sm:before:top-2 sm:before:bottom-0 sm:before:w-0.5 sm:before:-left-3 before:dark:bg-gray-300">
				    <div class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:dark:bg-violet-600" v-for="(acheivement,index) in acheivements" :key="index">
						<h3 class="text-xl font-semibold tracking-wide">{{ acheivement.title }}</h3>
						<time class="text-xs tracking-wide uppercase dark:text-gray-600">{{ acheivement.date }}</time>
						<p class="mt-3">{{ acheivement.description }}</p>
					</div>



				</div>
			</div>
		</div>
	</div>
</section>

        <!-- Footer -->
        <footer class="mt-8">
            <p class="text-center text-gray-600">Copyright &copy; 2024 All rights reserved.</p>
        </footer>
    </div>

    </div>
</template>

<script>
import { Head } from '@inertiajs/vue3';
export default {
    components: {
        Head
    },
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


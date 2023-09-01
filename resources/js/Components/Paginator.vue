<template>
    <div>
        <span class="rounded-2xl bg-white p-2">
            <component :is="(link.url) ? 'Link' : 'span'"
                   v-for="(link, index) in links"
                   :key="index"
                   :class="{'text-gray-500': !link.url, 'text-green-500 rounded-xl font-bold': link.active}"
                   :href="link.url"
                   class="px-1 text-black text-decoration-none m-1"
                   v-html="link.label">
             </component>
        </span>
        
        
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    components: {
        Link
    },
    props: {
        links: Array
    }
}
</script>
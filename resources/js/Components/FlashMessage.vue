<template>
    <div>
        <div v-if="$page.props.flash.success && show"
            class="animate-bounce delay-300 flex justify-between bg-green-600 bg-opacity-25 rounded-lg p-2 mb-4 text-sm text-success w-full break-all"
            role="alert">
            <div class="flex-1 text-white">
                <span class="text-lg mr-4"></span>
                {{ $page.props.flash.success }}
            </div>
            <span class="text-lg ml-4 cursor-pointer" @click="show = false">
                <font-awesome-icon title="Click To Close" class="text-red-400" icon="fa-solid fa-circle-xmark" />
            </span>
        </div>
        <div v-if="$page.props.flash.error && show"
            class="animate-bounce delay-300 flex justify-between bg-red-600 bg-opacity-25 rounded-lg p-4 mb-4 text-sm text-error w-full break-all"
            role="alert">
            <div class="flex-1 text-white">
                <span class="text-lg mr-4"></span>
                {{ $page.props.flash.error }}
            </div>
            <span class="text-lg ml-4 cursor-pointer" @click="show = false">
                <font-awesome-icon title="Click To Close" class="text-red-400" icon="fa-solid fa-circle-xmark" />
            </span>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            show: false,
        }
    },
    watch: {
        '$page.props.flash': {
            handler() {
                this.show = true;
            },
            immediate: true,
            deep: true
        }
    },
    created() {
        setTimeout(() => {
            if (this.show)
                this.show = false;
        }, 3000);
    }
}
</script>

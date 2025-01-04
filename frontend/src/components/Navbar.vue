<template>
    <nav class="border-b-2 border-gray-300">
        <div class=" mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-8">
                    <div class="flex gap-4 items-center">
                        <img class="h-8 w-8" src="../assets/amcc-logo.svg" alt="">
                        <a class="text-white hidden md:block text-2xl font-bold md:text-xl" href="#">/ AMCC Web Dev</a>
                    </div>
                    <div class="hidden md:block">
                        <nav>
                            <ul class="flex gap-4">
                                <li><a class="text-gray-1000 hover:underline" target="_blank" href="https://ungu.in/discord-amcc">Discord</a>
                                </li>
                                <li><a target="_blank" class="text-gray-1000 hover:underline"
                                        href="https://github.com/amccamikom/amcc-web-backend-2024/">Github</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <a href="ungu.in/discord-amcc">
                    <button :class="buttonStyle" class="hidden md:block">Join Now</button>
                </a>
            </div>
        </div>
    </nav>


</template>

<script>
import { buttonStyle } from '../styles/styles';

export default {
    name: 'Navbar',
    data() {
        return {
            buttonStyle
        }
    }
}
</script>
<template>
    <div v-html="markdown.render(source)"></div>
</template>

<script setup lang="ts">
import MarkdownIt from "markdown-it";
import hljs from 'highlight.js'
import json from 'highlight.js/lib/languages/json';
import 'highlight.js/styles/github-dark.css';
hljs.registerLanguage('json', json);

const markdown = new MarkdownIt({
    html: true,
    linkify: true,
    typographer: true,
    highlight: function (str, lang) {
        console.log('Detected language:', lang);
        const language = lang && hljs.getLanguage(lang) ? lang : 'json'; // Default ke JSON
        try {
            return hljs.highlight(str, { language }).value;
        } catch (__) {
            return ''; // fallback jika error
        }
    }
}
)

defineProps({
    source: {
        type: String,
        default: ""
    }
});
</script>
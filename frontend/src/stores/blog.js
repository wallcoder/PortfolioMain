import { defineStore } from "pinia";
import axios from "axios";
import { ref } from "vue";
export const useBlogStore = defineStore('blog', () => {
    const blogs = ref([]);

    const getBlogs = async () => {
        try {
            const response = await axios.get('/posts');
            blogs.value = response.data;
            console.log("blogs: ", blogs.value);

        } catch (error) {
            console.log(error);

        }
    }

    function formatDate(isoString) {
        const date = new Date(isoString);
        const day = date.getUTCDate();
        const month = date.toLocaleString('en-US', { month: 'long', timeZone: 'UTC' });
        const year = date.getUTCFullYear();
        
        return `${day} ${month} ${year}`;
    }

    return { getBlogs, blogs, formatDate }

})
import { defineStore } from "pinia";
import { ref } from "vue";
import axios from 'axios';

export const useBlogStore = defineStore('blog', () => {
    const blogs = ref([]);
    const nextCursor = ref(null);
    const loading = ref(false);
    const hasMore = ref(true);
    const isLoadingBlogPage = ref(false);
    const blog = ref({});

    const fetchBlogBySlug = async (slug) => {
        try {
            
            if (slug === blog?.value?.slug) return;

            isLoadingBlogPage.value = true;

            const response = await axios.get(`/blog/${slug}`);
            blog.value = response.data.data;
        } catch (err) {
            console.log(err);
        } finally {
            isLoadingBlogPage.value = false;
        }
    };

    const fetchBlogs = async (limit = 10, force=false) => {
        if ((loading.value || !hasMore.value) && !force) return;
        loading.value = true;
        console.log("hello")

        try {
            const res = await axios.get('/blogs', {
                params: {
                    limit,
                    cursor: nextCursor.value
                }
            });

            const data = res.data.data;

            if (data?.data?.length) {
                blogs.value.push(...data.data);
                nextCursor.value = data.next_cursor;
                hasMore.value = !!data.next_cursor;
            } else {
                hasMore.value = false;
            }

        } catch (err) {
            console.error(err);
        } finally {
            loading.value = false;
        }
    };

    return {
        blogs,
        nextCursor,
        loading, isLoadingBlogPage, blog,
        hasMore,
        fetchBlogs,
        fetchBlogBySlug
    };
});

import { defineStore } from "pinia";
import { ref } from "vue";
import axios from 'axios';

export const useProjectStore = defineStore('project', () => {
    const projects = ref([]);
    const nextCursor = ref(null);
    const loading = ref(false);
    const hasMore = ref(true);
    const isLoadingProjectPage = ref(false);
    const project = ref({});

    const fetchProjectBySlug = async (slug) => {
        try {
            
            if (slug === project?.value?.slug) return;

            isLoadingProjectPage.value = true;

            const response = await axios.get(`/project/${slug}`);
            project.value = response.data.data;
        } catch (err) {
            console.log(err);
        } finally {
            isLoadingProjectPage.value = false;
        }
    };

    const fetchProjects = async (limit = 10, force=false) => {
        if ((loading.value || !hasMore.value) && !force) return;
        loading.value = true;
        console.log("hello")

        try {
            const res = await axios.get('/projects', {
                params: {
                    limit,
                    cursor: nextCursor.value
                }
            });

            const data = res.data.data;

            if (data?.data?.length) {
                projects.value.push(...data.data);
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
        projects,
        nextCursor,
        loading, isLoadingProjectPage, project,
        hasMore,
        fetchProjects,
        fetchProjectBySlug
    };
});

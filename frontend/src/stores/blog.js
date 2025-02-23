import { defineStore, storeToRefs } from "pinia";
import axios from "axios";
import { ref } from "vue";
import { useLoaderStore } from "@/stores/loader"
import { Notivue, Notification, push } from 'notivue';
import { useRouter } from 'vue-router'
export const useBlogStore = defineStore('blog', () => {
    const { isLoading } = storeToRefs(useLoaderStore())
    const blogs = ref([]);
    const blog = ref({});
    const otherBlogs = ref([]);
    const blogsAll = ref([]);
    const searchTerm = ref('');
    const blogEdit = ref({});
    const editor = ref(null);
    const router = useRouter();

    const getBlogs = async (page = 1) => {
        if (blogs.value?.data?.length > 0 && blogs.value?.current_page === page) {
            console.log("page: ", page)
            return
        }

        try {
            console.log("page: ", page)

            console.log("blog before fetch: ", blogs.value.data);
            isLoading.value = true;
            const response = await axios.get(`/posts?page=${page}`);

            blogs.value = response.data;
            console.log(blogs.value)


        } catch (error) {
            console.log(error);

        } finally {
            isLoading.value = false;
        }
    }

    const delBlog = async (id) => {
        console.log("delete: ", id);
        try {
            const response = await axios.delete(`/posts/${id}`)
            push.success(response.data.message);
        } catch (error) {
            console.log(error);
            push.error(response.data.message);

        } finally {
            getBlogsAll()
        }


    }

    const getBlogsAll = async (page = 1, force = 'false') => {
        if (force) {
            try {
                console.log("page: ", page)

                console.log("blog before fetch: ", blogs.value.data);
                isLoading.value = true;
                const response = await axios.get(`/posts/all?page=${page}&search=${searchTerm.value}`);

                blogsAll.value = response.data;



            } catch (error) {
                console.log(error);

            } finally {
                isLoading.value = false;
            }

        } else {
            if (blogsAll.value?.data?.length > 0 && blogsAll.value?.current_page === page && !searchTerm.value) {

                return
            }

            try {
                console.log("page: ", page)

                console.log("blog before fetch: ", blogs.value.data);
                isLoading.value = true;
                const response = await axios.get(`/posts/all?page=${page}&search=${searchTerm.value}`);

                blogsAll.value = response.data;



            } catch (error) {
                console.log(error);

            } finally {
                isLoading.value = false;
            }

        }


    }



    let blogDetails = ref({
        title: '',
        image: '',
        imageUrl: '',
        description: '',
        content: '',
        status: ''

    })

    let editBlogDetails = ref({
        title: '',
        image: '',
        imageUrl: '',
        description: '',
        content: ''

    })

    const clearData = () => {
        blogDetails.value = {
            title: '',
            image: '',
            imageUrl: '',
            description: '',
            content: ''

        }

        editBlogDetails.value = {
            title: '',
            image: '',
            imageUrl: '',
            description: '',
            content: '',
            status: ''

        }

        blogEdit.value = {}
    }

    const handleImage = (event) => {
        const file = event.target.files[0];
        if (file) {
            blogDetails.value.image = file;
            blogDetails.value.imageUrl = URL.createObjectURL(file);
        }


    }

    const handleImageEdit = (event) => {
        const file = event.target.files[0];
        if (file) {
            console.log("file selected: ", file)
            editBlogDetails.value.image = file;
            editBlogDetails.value.imageUrl = URL.createObjectURL(file);
        }


    }

    const handleSubmit = async (statusValue = 'published') => {
        blogDetails.value.status = statusValue;
        const formData = new FormData();
        formData.append('status', blogDetails.value.status);
        formData.append('title', blogDetails.value.title);
        formData.append('description', blogDetails.value.description);
        formData.append('content', blogDetails.value.content);

        if (blogDetails.value.image instanceof File) {
            formData.append('image', blogDetails.value.image);
        } else {
            console.error("Image is not a File object!");
        }

        // Debug FormData content
        for (const pair of formData.entries()) {
            console.log(`${pair[0]}:`, pair[1]);
        }

        try {
            const response = await axios.post('/posts/create', formData, {
                headers: { "Content-Type": "multipart/form-data" }
            });
            console.log("response: ", response.data);
            push.success(response.data.message);
            router.push('/admin/blogs')
            clearData();
        } catch (err) {
            console.log(err);
            push.error('Error creating blog');
        }
    };

    const handleSubmitDraft = async () => {
        const formData = new FormData();
        formData.append('title', blogDetails.value.title)
        formData.append('description', blogDetails.value.description)
        formData.append('image', blogDetails.value.image)
        formData.append('content', blogDetails.value.content)

        try {
            const response = await axios.post('/posts/draft', formData, { headers: { 'Content-Type': 'multipart/form-data' } })
            console.log(response.data)
            push.success(response.data.message)
            clearData();
        } catch (err) {
            console.log(err)
            push.error('Error creating blog')
        }
    }

    const updateBlog = async (id) => {
        const formData = new FormData();

        console.log("edit blog details: ", JSON.parse(JSON.stringify(editBlogDetails.value)));

        formData.append('title', editBlogDetails.value.title);
        formData.append('description', editBlogDetails.value.description);
        formData.append('content', editBlogDetails.value.content);
        formData.append('status', editBlogDetails.value.status);

        if (editBlogDetails.value.image instanceof File) {

            formData.append('image', editBlogDetails.value.image);
        } else {
            console.warn("Image is not a file, skipping upload.");
        }

        for (let pair of formData.entries()) {
            console.log(pair[0], pair[1]);
        }



        try {

            const response = await axios.put(`/posts/${id}/update`, formData);
            console.log("response: ", response.data);
            
            router.push('/admin/blogs');
            push.success(response.data.message);
        } catch (err) {
            console.error(err);
            push.error('Error updating blog');
        }
    };




    const getBlogBySlug = async (slug) => {
        if (slug == blog.value?.slug) {
            console.log("not refreshed");
            return
        }
        try {
            blog.value = {};
            isLoading.value = true;
            const response = await axios.get(`/posts/${slug}`)
            blog.value = response.data;

        } catch (error) {
            console.log(error)

        } finally {
            isLoading.value = false;
        }
    }

    const getBlogById = async (id) => {

        if (id == blogEdit.value?.id) {
            console.log("not refreshed");
            return
        }
        try {
            blogEdit.value = {};
            isLoading.value = true;
            const response = await axios.get(`/posts/${id}/edit`)
            blogEdit.value = response.data;
            console.log("blog: ", blogEdit.value)

            editBlogDetails.value.title = blogEdit.value.title
            editBlogDetails.value.content = blogEdit.value.content
            editBlogDetails.value.description = blogEdit.value.description
            editBlogDetails.value.image = blogEdit.value.image
            editBlogDetails.value.status = blogEdit.value.status
            editor.value = blogEdit.value.content
            console.log("blog: ", blogEdit.value)



        } catch (error) {
            console.log(error)

        } finally {
            isLoading.value = false;
        }
    }




    function formatDate(isoString) {
        const date = new Date(isoString);
        const day = date.getUTCDate();
        const month = date.toLocaleString('en-US', { month: 'long', timeZone: 'UTC' });
        const year = date.getUTCFullYear();

        return `${day} ${month} ${year}`;
    }
    function formatDate2(dateString) {
        const date = new Date(dateString);
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are 0-based
        const year = date.getFullYear();

        return `${day}/${month}/${year}`;
    }

    return { handleSubmitDraft, updateBlog, handleImageEdit, editor, editBlogDetails, getBlogById, blogEdit, delBlog, formatDate2, getBlogsAll, blogsAll, blogDetails, clearData, handleImage, handleSubmit, getBlogs, blogs, formatDate, blog, getBlogBySlug, blogDetails, searchTerm }

})
import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import { useMotion } from '@vueuse/motion'

export const useAnimationStore = defineStore('animation', () => {
    const targetEl = ref();
    useMotion(targetEl, {
        initial: { opacity: 0, y: 300, transition: { duration: 900, ease: 'easeOut' } },

        visibleOnce: { opacity: 1, y: 0, transition: { duration: 900, ease: 'easeOut' } }


    })

    const initialValue = ref({ opacity: 0, y: 200, transition: { duration: 900, ease: 'easeOut' } });
    const visibleOnceValue = ref({ opacity: 1, y: 0, transition: { duration: 900, ease: 'easeOut' } })

    const initialValueImg = ref({ opacity: 0, y: 50, transition: { duration: 600, ease: 'easeIn' } });
    const visibleOnceValueImg = ref({ opacity: 1, y: 0, transition: { duration: 600, ease: 'easeIn' } })

    return { targetEl, initialValue, initialValueImg, visibleOnceValue, visibleOnceValueImg }
})

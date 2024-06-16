// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: false },
  ssr: true,
  app: {
    cdnURL: '/wp-content/themes/your-startup/client/.output/public/',
    pageTransition: { name: 'page'},
    layoutTransition: { name: 'layout'}
  },
  experimental: {
    payloadExtraction: false
  },
  build: {
    transpile:
      process.env.NODE_ENV === 'production'
        ? [
          'naive-ui',
          'vueuc',
          '@css-render/vue3-ssr',
          '@juggle/resize-observer'
        ]
        : ['@juggle/resize-observer']
  },
  vite: {
    optimizeDeps: {
      include:
        process.env.NODE_ENV === 'development'
          ? ['naive-ui', 'vueuc', 'date-fns-tz/formatInTimeZone']
          : []
    }
  },
  modules: ['vue-yandex-maps/nuxt'],
  yandexMaps: {
    apikey: 'cc27fab4-c5a1-412b-9837-171d207a6bda',
  },
  components: {
      global: true,
      dirs: ['~/components']
    },
  
})

import "./assets/style.css"

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import { createPinia } from "pinia"

const pania=createPinia()
const app = createApp(App)
app.use(pania)
app.use(router)

app.mount('#app')

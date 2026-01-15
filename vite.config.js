import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [react()],
  server: {
    proxy: {
      '/send_form.php': {
        target: 'http://localhost/Genesis',
        changeOrigin: true,
        rewrite: (path) => path,
      },
    },
    cors: true,
  },
  build: {
    outDir: '../dist-react',
  },
})

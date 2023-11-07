import { PluginOption, defineConfig } from 'vite'
import { resolve } from 'path'

const reloadPlugin = (): PluginOption => { 
    return {
        name: "phpReload",
        enforce: "post",
        handleHotUpdate({ file, server }) {
            if (file.endsWith('.php')) server.ws.send({ type: 'full-reload', path: '*' });
        }
    }
}

export default defineConfig({
    build: {
        manifest: true,
        rollupOptions: {
            input: {
                main: resolve(__dirname) + '/src/main.ts'
            }
        }
    },
    server: {
        cors: true,
        strictPort: false,
        port: 4510,
    },
    plugins: [
        reloadPlugin()
    ]
});

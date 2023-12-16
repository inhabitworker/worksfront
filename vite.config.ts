import { PluginOption, defineConfig } from 'vite'

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
		// emptyOutDir: true,
        rollupOptions: {
            input: './src/main.ts',
        }
    },
    server: {
		host: true,
        cors: true,
        strictPort: true,
        port: 4510
    },
	plugins: [ reloadPlugin() ]
});

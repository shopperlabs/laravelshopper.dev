import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import fs from 'fs'
import { homedir } from 'os'
import { resolve } from 'path'

let host = 'laravelshopper-v2.dev.test'

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
    {
      name: 'blade',
      handleHotUpdate({ file, server }) {
        if (file.endsWith('.blade.php')) {
          server.ws.send({
            type: 'full-reload',
            path: '*',
          });
        }
      },
    }
  ],
  server: detectServerConfig(host),
})

function detectServerConfig(host) {
  let keyPath = resolve(homedir(), `.valet/Certificates/${host}.key`)
  let certificatePath = resolve(homedir(), `.valet/Certificates/${host}.crt`)

  if (! fs.existsSync(keyPath)) {
    return {}
  }

  if (! fs.existsSync(certificatePath)) {
    return {}
  }

  return {
    hmr: {host},
    host,
    https: {
      key: fs.readFileSync(keyPath),
      cert: fs.readFileSync(certificatePath),
    },
  }
}

// Generate AVIF + WebP variants for every JPEG under public/images.
// Run: node scripts/optimize-images.mjs
import sharp from 'sharp';
import { readdir, stat } from 'node:fs/promises';
import path from 'node:path';

const dirs = ['public/images/hero', 'public/images/menu', 'public/images/gallery'];
const kb = (n) => Math.round(n / 1024);

let jpg = 0, webp = 0, avif = 0;

for (const dir of dirs) {
    let files;
    try { files = await readdir(dir); } catch { continue; }
    for (const f of files.filter((x) => /\.jpe?g$/i.test(x))) {
        const src = path.join(dir, f);
        const base = src.replace(/\.jpe?g$/i, '');
        const input = sharp(src);

        await input.clone().webp({ quality: 78 }).toFile(base + '.webp');
        await input.clone().avif({ quality: 52 }).toFile(base + '.avif');

        jpg  += (await stat(src)).size;
        webp += (await stat(base + '.webp')).size;
        avif += (await stat(base + '.avif')).size;
        console.log(`  ${f}  →  webp + avif`);
    }
}

console.log(`\nTotals: JPEG ${kb(jpg)} KB · WebP ${kb(webp)} KB · AVIF ${kb(avif)} KB`);
console.log(`AVIF saves ~${Math.round((1 - avif / jpg) * 100)}% vs JPEG.`);

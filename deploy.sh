# ── SOFWAH-WEB · Laravel Forge deploy script (zero-downtime releases) ────────
# Paste this into the Forge site's "Deploy Script". Enable Quick Deploy on main.

$CREATE_RELEASE()

cd $FORGE_RELEASE_DIRECTORY

# Fail fast with a clear message if the checkout is incomplete (e.g. a stale
# release), instead of a confusing "Could not open input file: artisan" later.
if [ ! -f artisan ] || [ ! -f bootstrap/app.php ] || [ ! -f public/index.php ]; then
    echo "FATAL: incomplete checkout — artisan / bootstrap/app.php / public/index.php missing."
    echo "Deploy a fresh clone of origin/main (these files are present there)."
    exit 1
fi

# storage/ is symlinked to shared storage BEFORE this runs; on a fresh site those
# framework dirs may not exist yet, so Composer's package:discover fails with
# "Please provide a valid cache path". Create them (and bootstrap/cache) first.
mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs bootstrap/cache

$FORGE_COMPOSER install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# --include=dev so Vite/Tailwind (devDependencies) are available for the build
npm ci --include=dev || npm install --include=dev
npm run build

$FORGE_PHP artisan optimize
$FORGE_PHP artisan storage:link

# Non-blocking: the landing page queries no database, so a first deploy must
# not fail if the DB isn't ready yet. Migrations (leads table) apply as soon as
# the DB is configured — on this or any later deploy.
$FORGE_PHP artisan migrate --force --graceful || true

$ACTIVATE_RELEASE()

$RESTART_QUEUES()

#!/usr/bin/env node
const { execSync } = require('child_process');
const fs = require('fs');
const path = require('path');

// Try multiple possible locations for tailwindcss binary
const possiblePaths = [
  path.join(__dirname, 'node_modules', '.bin', 'tailwindcss'),
  path.join(process.cwd(), 'node_modules', '.bin', 'tailwindcss'),
  'tailwindcss' // fallback to system PATH
];

let tailwindPath = null;
for (const binPath of possiblePaths) {
  try {
    if (fs.existsSync(binPath) || binPath === 'tailwindcss') {
      // Test if it's executable
      execSync(`${binPath} --version`, { stdio: 'ignore' });
      tailwindPath = binPath;
      break;
    }
  } catch (e) {
    // Continue to next path
  }
}

if (!tailwindPath) {
  console.log('Warning: tailwindcss not found, skipping CSS build');
  console.log('If CSS file already exists, this is safe to ignore');
  process.exit(0);
}

try {
  // Ensure output directory exists
  const outputDir = path.join(__dirname, 'public', 'assets', 'css');
  if (!fs.existsSync(outputDir)) {
    fs.mkdirSync(outputDir, { recursive: true });
  }

  // Run tailwindcss
  execSync(
    `${tailwindPath} -i input.css -o public/assets/css/tailwind.css --minify`,
    { stdio: 'inherit', cwd: __dirname }
  );
  console.log('CSS build completed successfully');
} catch (error) {
  console.error('CSS build failed:', error.message);
  // Don't fail the build if CSS already exists
  if (fs.existsSync('public/assets/css/tailwind.css')) {
    console.log('Using existing CSS file');
    process.exit(0);
  }
  process.exit(1);
}


module.exports = {
    plugins: ['@shufo/prettier-plugin-blade', '@prettier/plugin-php'],
    overrides: [
        {
            files: '*.php',
            options: { parser: 'php' },
        },
        {
            files: '*.blade.php',
            options: { parser: 'blade' },
        },
    ],
};

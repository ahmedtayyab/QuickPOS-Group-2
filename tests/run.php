<?php
/**
 * Minimal test runner (plain PHP, no dependencies).
 *
 * Usage:  php tests/run.php
 *
 * Every file in tests/ ending in "Test.php" returns an array of
 * test name => callable. A test passes when it finishes without throwing;
 * assertion helpers below throw on failure. The process exits with code 1
 * if any test fails, so CI marks the job as failed.
 */

declare(strict_types=1);

final class AssertionFailed extends Exception
{
}

function assert_true(bool $condition, string $message): void
{
    if (!$condition) {
        throw new AssertionFailed($message);
    }
}

function assert_same(mixed $expected, mixed $actual, string $message = ''): void
{
    if ($expected !== $actual) {
        throw new AssertionFailed(
            ($message !== '' ? $message . ': ' : '')
            . 'expected ' . var_export($expected, true) . ', got ' . var_export($actual, true)
        );
    }
}

$files = glob(__DIR__ . '/*Test.php') ?: [];
sort($files);

$passed = 0;
$failed = 0;

foreach ($files as $file) {
    $tests = require $file;
    echo PHP_EOL . basename($file) . PHP_EOL;

    foreach ($tests as $name => $test) {
        try {
            $test();
            $passed++;
            echo "  PASS  {$name}" . PHP_EOL;
        } catch (Throwable $e) {
            $failed++;
            echo "  FAIL  {$name}" . PHP_EOL . "        " . $e->getMessage() . PHP_EOL;
        }
    }
}

echo PHP_EOL . sprintf('%d passed, %d failed, %d total', $passed, $failed, $passed + $failed) . PHP_EOL;

if ($passed + $failed === 0) {
    echo 'No tests found.' . PHP_EOL;
    exit(1);
}

exit($failed > 0 ? 1 : 0);

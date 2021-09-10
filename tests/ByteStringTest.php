<?php

declare(strict_types=1);

namespace Stadly\FileWaiter\Adapter;

use GuzzleHttp\Psr7\HttpFactory;
use PHPUnit\Framework\TestCase;
use Stadly\Http\Header\Value\EntityTag\EntityTag;
use Stadly\Http\Header\Value\MediaType\MediaType;

/**
 * @coversDefaultClass \Stadly\FileWaiter\Adapter\ByteString
 * @covers ::<protected>
 * @covers ::<private>
 */
final class ByteStringTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testCanConstructByteStringAdapter(): void
    {
        $file = new ByteString('abcdefghijklmnopqrstuvwxyz', new HttpFactory());

        // Force generation of code coverage
        $fileConstruct = new ByteString('abcdefghijklmnopqrstuvwxyz', new HttpFactory());
        self::assertEquals($file, $fileConstruct);
    }

    /**
     * @covers ::__construct
     */
    public function testCanConstructByteStringAdapterToEmptyString(): void
    {
        $file = new ByteString('', new HttpFactory());

        // Force generation of code coverage
        $fileConstruct = new ByteString('', new HttpFactory());
        self::assertEquals($file, $fileConstruct);
    }

    /**
     * @covers ::getFileStream
     */
    public function testFileStreamEmitsStringContents(): void
    {
        $file = new ByteString('abcdefghijklmnopqrstuvwxyz', new HttpFactory());

        self::assertSame('abcdefghijklmnopqrstuvwxyz', (string)$file->getFileStream());
    }

    /**
     * @covers ::getFileName
     */
    public function testFileNameIsNull(): void
    {
        $file = new ByteString('abcdefghijklmnopqrstuvwxyz', new HttpFactory());

        self::assertNull($file->getFileName());
    }

    /**
     * @covers ::getFileSize
     */
    public function testCanGetFileSize(): void
    {
        $file = new ByteString('abcdefghijklmnopqrstuvwxyz', new HttpFactory());

        self::assertSame(26, $file->getFileSize());
    }

    /**
     * @covers ::getFileSize
     */
    public function testFileSizeOfEmptyStringIsZero(): void
    {
        $file = new ByteString('', new HttpFactory());

        self::assertSame(0, $file->getFileSize());
    }

    /**
     * @covers ::getMediaType
     */
    public function testMediaTypeOfEmptyStringIsApplicationEmpty(): void
    {
        $file = new ByteString('', new HttpFactory());

        self::assertEquals(new MediaType('application', 'x-empty'), $file->getMediaType());
    }

    /**
     * @covers ::getMediaType
     */
    public function testMediaTypeOfCharacterStringIsTextPlain(): void
    {
        $file = new ByteString('abcdefghijklmnopqrstuvwxyz', new HttpFactory());

        self::assertEquals(new MediaType('text', 'plain'), $file->getMediaType());
    }

    /**
     * @covers ::getLastModifiedDate
     */
    public function testLastModifiedDateIsNull(): void
    {
        $file = new ByteString('abcdefghijklmnopqrstuvwxyz', new HttpFactory());

        self::assertNull($file->getLastModifiedDate());
    }

    /**
     * @covers ::getEntityTag
     */
    public function testCanGetEntityTag(): void
    {
        $file = new ByteString('abcdefghijklmnopqrstuvwxyz', new HttpFactory());

        self::assertEquals(new EntityTag('c3fcd3d76192e4007dfb496cca67e13b'), $file->getEntityTag());
    }
}

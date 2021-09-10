<?php

declare(strict_types=1);

namespace Stadly\FileWaiter\Adapter;

use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Stadly\FileWaiter\Adapter;
use Stadly\Http\Header\Value\Date;
use Stadly\Http\Header\Value\EntityTag\EntityTag;
use Stadly\Http\Header\Value\MediaType\MediaType;
use finfo;

/**
 * Adapter for handling files represented as a byte string.
 */
final class ByteString implements Adapter
{
    /**
     * @var string Content of the byte string.
     */
    private $content;

    /**
     * @var StreamFactoryInterface Factory for creating streams.
     */
    private $streamFactory;

    /**
     * Constructor.
     *
     * @param string $content Content of the byte string.
     * @param StreamFactoryInterface $streamFactory Factory for creating streams.
     */
    public function __construct(string $content, StreamFactoryInterface $streamFactory)
    {
        $this->content = $content;
        $this->streamFactory = $streamFactory;
    }

    /**
     * @return StreamInterface File stream that can be used to read from the file.
     */
    public function getFileStream(): StreamInterface
    {
        return $this->streamFactory->createStream($this->content);
    }

    /**
     * @inheritdoc
     */
    public function getFileName(): ?string
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getFileSize(): ?int
    {
        return mb_strlen($this->content, /*encoding*/'8bit');
    }

    /**
     * @inheritdoc
     */
    public function getMediaType(): ?MediaType
    {
        $fileInfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $fileInfo->buffer($this->content);

        if ($mimeType === false) {
            // @codeCoverageIgnoreStart
            return null;
            // @codeCoverageIgnoreEnd
        }

        return MediaType::fromString($mimeType);
    }

    /**
     * @inheritdoc
     */
    public function getLastModifiedDate(): ?Date
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getEntityTag(): ?EntityTag
    {
        return new EntityTag(md5($this->content));
    }
}

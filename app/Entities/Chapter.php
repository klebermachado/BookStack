<?php namespace BookStack\Entities;

use BookStack\Uploads\Image;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Chapter
 * @property Collection<Page> $pages
 * @package BookStack\Entities
 */
class Chapter extends BookChild
{
    public $searchFactor = 1.3;

    protected $fillable = ['name', 'description', 'link', 'image_id', 'priority', 'book_id'];

    /**
     * Get the pages that this chapter contains.
     * @param string $dir
     * @return mixed
     */
    public function pages($dir = 'ASC')
    {
        return $this->hasMany(Page::class)->orderBy('priority', $dir);
    }

    /**
     * Get the url of this chapter.
     * @param string|bool $path
     * @return string
     */
    public function getUrl($path = false)
    {
        $bookSlug = $this->getAttribute('bookSlug') ? $this->getAttribute('bookSlug') : $this->book->slug;
        $fullPath = '/books/' . urlencode($bookSlug) . '/chapter/' . urlencode($this->slug);

        if ($path !== false) {
            $fullPath .= '/' . trim($path, '/');
        }

        return url($fullPath);
    }

    /**
     * Get an excerpt of this chapter's description to the specified length or less.
     * @param int $length
     * @return string
     */
    public function getExcerpt(int $length = 100)
    {
        $description = $this->text ?? $this->description;
        return mb_strlen($description) > $length ? mb_substr($description, 0, $length-3) . '...' : $description;
    }

    /**
     * Check if this chapter has any child pages.
     * @return bool
     */
    public function hasChildren()
    {
        return count($this->pages) > 0;
    }

    /**
     * Get the visible pages in this chapter.
     */
    public function getVisiblePages(): Collection
    {
        return $this->pages()->visible()
        ->orderBy('draft', 'desc')
        ->orderBy('priority', 'asc')
        ->get();
    }

    public function icon(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id');
    }

    public function getChapterCover($width = 250, $height = 250)
    {
        // TODO - Make generic, focused on books right now, Perhaps set-up a better image
        $default = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
        if (!$this->image_id) {
            return $default;
        }

        try {
            $cover = $this->cover ? url($this->cover->getThumb($width, $height, true)) : $default;
        } catch (\Exception $err) {
            $cover = $default;
        }
        return $cover;
    }

    /**
     * Get the cover image of the shelf
     */
    public function cover(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}

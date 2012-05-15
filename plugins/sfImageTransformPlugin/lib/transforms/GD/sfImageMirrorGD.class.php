<?php
/*
 * This file is part of the sfImageTransform package.
 * (c) 2007 Stuart Lowes <stuart.lowes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * sfImageMirrorGD class.
 *
 * Mirrors a GD image.
 *
 * Creates a mirror image of the original image.
 *
 * @package sfImageTransform
 * @subpackage transforms
 * @author Stuart Lowes <stuart.lowes@gmail.com>
 * @version SVN: $Id$
 */
class sfImageMirrorGD extends sfImageTransformAbstract
{
    
  protected $flip = 1;

  /**
   * Construct an sfImageScale object.
   *
   * @param float
   */
  public function __construct($flip)
  {
    $this->setFlip($flip);
  }

  /**
   * Set the scale factor.
   *
   * @param float
   */
  public function setFlip($flip)
  {
    if (is_numeric($flip))
    {
      $this->flip = $flip;
    }
  }

  /**
   * Gets the scale factor.
   *
   * @return float
   */
  public function getFlip()
  {
    return $this->flip;
  }    
    
    
  /**
   * Apply the transform to the sfImage object.
   *
   * @param integer
   * @return sfImage
   */
  protected function transform(sfImage $image)
  {
    $resource = $image->getAdapter()->getHolder();

    $width = imagesx($resource);
    $height = imagesy($resource);

    imagealphablending($resource,true);

    $dest_resource = $image->getAdapter()->getTransparentImage($width, $height);
    imagealphablending($dest_resource,true);    
    
    if($this->flip == 1) {
        $dst_y = 0;
        $src_y = 0;

        $coordinate = ($width - 1);

        foreach(range($width, 0) as $range) {
            $src_x = $range;
            $dst_x = $coordinate - $range;

            ImageCopy($dest_resource, $resource, $dst_x, $dst_y, $src_x, $src_y, 1, $height);
        }
    } elseif($this->flip == 2) {
        $dst_x = 0;
        $src_x = 0;

        $coordinate = ($height - 1);

        foreach(range($height, 0) as $range) {
            $src_y = $range;
            $dst_y = $coordinate - $range;

            ImageCopy($dest_resource, $resource, $dst_x, $dst_y, $src_x, $src_y, $width, 1);
        }
    }    
  
    // Tidy up
    imagedestroy($resource);

    // Replace old image with flipped version
    $image->getAdapter()->setHolder($dest_resource);

    return $image;
  }
}

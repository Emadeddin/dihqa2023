<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use T4\Helper\Author as Author;
// load language t4
\JFactory::getLanguage()->load('plg_system_' . T4_PLUGIN, JPATH_ADMINISTRATOR);

$moduleclass_sfx = $params->get('moduleclass_sfx', '');
$i = 0;
?>

<div class="<?php echo $moduleclass_sfx; ?>magz-layout highlight-center-layout text-center row">
  <!-- first 5 items intro -->
  <div class="col-child col-12 col-md-3">
    <div class="blog-item">
      <!-- Item image -->
      <?php
      $item = $list[1];
      $images = "";
      if (isset($item->images)) {
        $images = json_decode($item->images);
      }

      $imgexists = (isset($images->image_intro) and !empty($images->image_intro)) || (isset($images->image_fulltext) and !empty($images->image_fulltext));

      if ($imgexists) {
        $images->image_intro = $images->image_intro ? $images->image_intro : $images->image_fulltext;
      ?>

        <a class="item-image" href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>">
          <img src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo $item->title; ?>" />
        </a>
      <?php } ?>
      <!-- // Item image -->
      <div class="item-meta">
        <?php if ($item->displayCategoryTitle) : ?>
          <span class="item-cat">
            <?php echo $item->displayCategoryTitle; ?>
          </span>
        <?php endif; ?>
      </div>
      <?php if ($params->get('link_titles') == 1) : ?>
        <h3 class="item-title"><a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>"><?php echo $item->title; ?></a></h3>
      <?php else : ?>
        <h3><?php echo $item->title; ?></h3>
      <?php endif; ?>
      <div class="item-meta">

        <?php if ($params->get('show_author')) : ?>
          <?php $author_info = Author::authorInfo($item); ?>
          <span class="item-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
            <?php $author = $img_alt = ($item->created_by_alias ?: $item->author); ?>
            <?php $author = '' . $author . ''; ?>
            
            <?php if (!empty($author_info->link)) : ?>
              <?php echo Text::sprintf('TPL_CONTENT_WRITTEN_BY', HTMLHelper::_('link', $author_info->link, $author, array('itemprop' => 'url'))); ?>
            <?php else : ?>
              <?php echo Text::sprintf('TPL_CONTENT_WRITTEN_BY', $author); ?>
            <?php endif; ?>
          </span>
        <?php endif; ?>

        <?php if ($item->displayDate) : ?>
          <span class="item-date">
            <?php echo $item->displayDate; ?>
          </span>
        <?php endif; ?>
      </div>

      <?php if ($params->get('show_readmore')) : ?>
        <p class="item-readmore">
          <a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
            <?php if ($item->params->get('access-view') == false) : ?>
              <?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
            <?php elseif ($readmore = $item->alternative_readmore) : ?>
              <?php echo $readmore; ?>
              <?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
            <?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
              <?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
            <?php else : ?>
              <?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
              <?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
            <?php endif; ?>
          </a>
        </p>
      <?php endif; ?>
    </div>
    <div class="blog-item">
      <!-- Item image -->
      <?php
      $item = $list[3];
      $images = "";
      if (isset($item->images)) {
        $images = json_decode($item->images);
      }

      $imgexists = (isset($images->image_intro) and !empty($images->image_intro)) || (isset($images->image_fulltext) and !empty($images->image_fulltext));

      if ($imgexists) {
        $images->image_intro = $images->image_intro ? $images->image_intro : $images->image_fulltext;
      ?>

        <a class="item-image" href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>">
          <img src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo $item->title; ?>" />
        </a>
      <?php } ?>
      <!-- // Item image -->
      <div class="item-meta">
        <?php if ($item->displayCategoryTitle) : ?>
          <span class="item-cat">
            <?php echo $item->displayCategoryTitle; ?>
          </span>
        <?php endif; ?>
      </div>
      <?php if ($params->get('link_titles') == 1) : ?>
        <h3 class="item-title"><a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>"><?php echo $item->title; ?></a></h3>
      <?php else : ?>
        <h3><?php echo $item->title; ?></h3>
      <?php endif; ?>
      <div class="item-meta">

        <?php if ($params->get('show_author')) : ?>
          <?php $author_info = Author::authorInfo($item); ?>
          <span class="item-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
            <?php $author = $img_alt = ($item->created_by_alias ?: $item->author); ?>
            <?php $author = '' . $author . ''; ?>
            
            <?php if (!empty($author_info->link)) : ?>
              <?php echo Text::sprintf('TPL_CONTENT_WRITTEN_BY', HTMLHelper::_('link', $author_info->link, $author, array('itemprop' => 'url'))); ?>
            <?php else : ?>
              <?php echo Text::sprintf('TPL_CONTENT_WRITTEN_BY', $author); ?>
            <?php endif; ?>
          </span>
        <?php endif; ?>

        <?php if ($item->displayDate) : ?>
          <span class="item-date">
            <?php echo $item->displayDate; ?>
          </span>
        <?php endif; ?>
      </div>

      <?php if ($params->get('show_readmore')) : ?>
        <p class="item-readmore">
          <a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
            <?php if ($item->params->get('access-view') == false) : ?>
              <?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
            <?php elseif ($readmore = $item->alternative_readmore) : ?>
              <?php echo $readmore; ?>
              <?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
            <?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
              <?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
            <?php else : ?>
              <?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
              <?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
            <?php endif; ?>
          </a>
        </p>
      <?php endif; ?>
    </div>
  </div>
  <div class="main-item col-12 col-md-6">
    <div class="blog-item">
      <!-- Item image -->
      <?php
      $item = $list[0];
      $images = "";
      if (isset($item->images)) {
        $images = json_decode($item->images);
      }

      $imgexists = (isset($images->image_intro) and !empty($images->image_intro)) || (isset($images->image_fulltext) and !empty($images->image_fulltext));

      if ($imgexists) {
        $images->image_intro = $images->image_intro ? $images->image_intro : $images->image_fulltext;
      ?>

        <a class="item-image" href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>">
          <img src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo $item->title; ?>" />
        </a>
      <?php } ?>
      <!-- // Item image -->

      <div class="item-contents">
        <div class="item-meta">
          <?php if ($item->displayCategoryTitle) : ?>
            <span class="item-cat">
              <?php echo $item->displayCategoryTitle; ?>
            </span>
          <?php endif; ?>
        </div>

        <?php if ($params->get('link_titles') == 1) : ?>
          <h2 class="item-title"><a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>"><?php echo $item->title; ?></a></h2>
        <?php else : ?>
          <h2><?php echo $item->title; ?></h2>
        <?php endif; ?>

        <?php if ($params->get('show_introtext')) : ?>
          <p class="item-introtext">
            <?php echo $item->displayIntrotext; ?>
          </p>
        <?php endif; ?>

        <div class="item-meta">
          <?php if ($params->get('show_author')) : ?>
            <?php $author_info = Author::authorInfo($item); ?>
            <span class="item-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
              <?php $author = $img_alt = ($item->created_by_alias ?: $item->author); ?>
              <?php $author = '' . $author . ''; ?>
              

              <?php if (!empty($author_info->link)) : ?>
                <?php echo Text::sprintf('TPL_CONTENT_WRITTEN_BY', HTMLHelper::_('link', $author_info->link, $author, array('itemprop' => 'url'))); ?>
              <?php else : ?>
                <?php echo Text::sprintf('TPL_CONTENT_WRITTEN_BY', $author); ?>
              <?php endif; ?>
            </span>
          <?php endif; ?>

          <?php if ($item->displayDate) : ?>
            <span class="item-date">
              <?php echo $item->displayDate; ?>
            </span>
          <?php endif; ?>
        </div>

        <?php if ($params->get('show_readmore')) : ?>
          <p class="item-readmore">
            <a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
              <?php if ($item->params->get('access-view') == false) : ?>
                <?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
              <?php elseif ($readmore = $item->alternative_readmore) : ?>
                <?php echo $readmore; ?>
                <?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
              <?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
                <?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
              <?php else : ?>
                <?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
                <?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
              <?php endif; ?>
            </a>
          </p>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="col-child col-12 col-md-3">
    <div class="blog-item">
      <!-- Item image -->
      <?php
      $item = $list[2];
      $images = "";
      if (isset($item->images)) {
        $images = json_decode($item->images);
      }

      $imgexists = (isset($images->image_intro) and !empty($images->image_intro)) || (isset($images->image_fulltext) and !empty($images->image_fulltext));

      if ($imgexists) {
        $images->image_intro = $images->image_intro ? $images->image_intro : $images->image_fulltext;
      ?>

        <a class="item-image" href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>">
          <img src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo $item->title; ?>" />
        </a>
      <?php } ?>
      <!-- // Item image -->
      <div class="item-meta">
        <?php if ($item->displayCategoryTitle) : ?>
          <span class="item-cat">
            <?php echo $item->displayCategoryTitle; ?>
          </span>
        <?php endif; ?>
      </div>
      <?php if ($params->get('link_titles') == 1) : ?>
        <h3 class="item-title"><a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>"><?php echo $item->title; ?></a></h3>
      <?php else : ?>
        <h3><?php echo $item->title; ?></h3>
      <?php endif; ?>
      <div class="item-meta">

        <?php if ($params->get('show_author')) : ?>
          <?php $author_info = Author::authorInfo($item); ?>
          <span class="item-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
            <?php $author = $img_alt = ($item->created_by_alias ?: $item->author); ?>
            <?php $author = '' . $author . ''; ?>
            
            <?php if (!empty($author_info->link)) : ?>
              <?php echo Text::sprintf('TPL_CONTENT_WRITTEN_BY', HTMLHelper::_('link', $author_info->link, $author, array('itemprop' => 'url'))); ?>
            <?php else : ?>
              <?php echo Text::sprintf('TPL_CONTENT_WRITTEN_BY', $author); ?>
            <?php endif; ?>
          </span>
        <?php endif; ?>

        <?php if ($item->displayDate) : ?>
          <span class="item-date">
            <?php echo $item->displayDate; ?>
          </span>
        <?php endif; ?>
      </div>

      <?php if ($params->get('show_readmore')) : ?>
        <p class="item-readmore">
          <a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
            <?php if ($item->params->get('access-view') == false) : ?>
              <?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
            <?php elseif ($readmore = $item->alternative_readmore) : ?>
              <?php echo $readmore; ?>
              <?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
            <?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
              <?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
            <?php else : ?>
              <?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
              <?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
            <?php endif; ?>
          </a>
        </p>
      <?php endif; ?>
    </div>
    <div class="blog-item">
      <!-- Item image -->
      <?php
      $item = $list[4];
      $images = "";
      if (isset($item->images)) {
        $images = json_decode($item->images);
      }

      $imgexists = (isset($images->image_intro) and !empty($images->image_intro)) || (isset($images->image_fulltext) and !empty($images->image_fulltext));

      if ($imgexists) {
        $images->image_intro = $images->image_intro ? $images->image_intro : $images->image_fulltext;
      ?>

        <a class="item-image" href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>">
          <img src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo $item->title; ?>" />
        </a>
      <?php } ?>
      <!-- // Item image -->

      <div class="item-meta">
        <?php if ($item->displayCategoryTitle) : ?>
          <span class="item-cat">
            <?php echo $item->displayCategoryTitle; ?>
          </span>
        <?php endif; ?>
      </div>

      <?php if ($params->get('link_titles') == 1) : ?>
        <h3 class="item-title"><a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>"><?php echo $item->title; ?></a></h3>
      <?php else : ?>
        <h3><?php echo $item->title; ?></h3>
      <?php endif; ?>
      <div class="item-meta">

        <?php if ($params->get('show_author')) : ?>
          <?php $author_info = Author::authorInfo($item); ?>
          <span class="item-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
            <?php $author = $img_alt = ($item->created_by_alias ?: $item->author); ?>
            <?php $author = '' . $author . ''; ?>
            
            <?php if (!empty($author_info->link)) : ?>
              <?php echo Text::sprintf('TPL_CONTENT_WRITTEN_BY', HTMLHelper::_('link', $author_info->link, $author, array('itemprop' => 'url'))); ?>
            <?php else : ?>
              <?php echo Text::sprintf('TPL_CONTENT_WRITTEN_BY', $author); ?>
            <?php endif; ?>
          </span>
        <?php endif; ?>

        <?php if ($item->displayDate) : ?>
          <span class="item-date">
            <?php echo $item->displayDate; ?>
          </span>
        <?php endif; ?>
      </div>

      <?php if ($params->get('show_readmore')) : ?>
        <p class="item-readmore">
          <a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
            <?php if ($item->params->get('access-view') == false) : ?>
              <?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
            <?php elseif ($readmore = $item->alternative_readmore) : ?>
              <?php echo $readmore; ?>
              <?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
            <?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
              <?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
            <?php else : ?>
              <?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
              <?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
            <?php endif; ?>
          </a>
        </p>
      <?php endif; ?>
    </div>
  </div>
  <!-- first 5 items intro -->

  <!-- other items -->
  <div class="col-child col-12">
    <div class="row">
      <?php for ($i = 5; $i < count($list); $i++) : ?>
        <div class="blog-item col-12 col-md-3">
          <!-- Item image -->
          <?php
          $item = $list[$i];
          $images = "";
          if (isset($item->images)) {
            $images = json_decode($item->images);
          }
  
          $imgexists = (isset($images->image_intro) and !empty($images->image_intro)) || (isset($images->image_fulltext) and !empty($images->image_fulltext));
  
          if ($imgexists) {
            $images->image_intro = $images->image_intro ? $images->image_intro : $images->image_fulltext;
          ?>
  
            <a class="item-image" href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>">
              <img src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo $item->title; ?>" />
            </a>
          <?php } ?>
          <!-- // Item image -->
          <div class="item-meta">
            <?php if ($item->displayCategoryTitle) : ?>
              <span class="item-cat">
                <?php echo $item->displayCategoryTitle; ?>
              </span>
            <?php endif; ?>
          </div>
          <?php if ($params->get('link_titles') == 1) : ?>
            <h3 class="item-title"><a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>"><?php echo $item->title; ?></a></h3>
          <?php else : ?>
            <h3><?php echo $item->title; ?></h3>
          <?php endif; ?>
          <div class="item-meta">
  
            <?php if ($params->get('show_author')) : ?>
              <?php $author_info = Author::authorInfo($item); ?>
              <span class="item-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                <?php $author = $img_alt = ($item->created_by_alias ?: $item->author); ?>
                <?php $author = '' . $author . ''; ?>
                
                <?php if (!empty($author_info->link)) : ?>
                  <?php echo Text::sprintf('TPL_CONTENT_WRITTEN_BY', HTMLHelper::_('link', $author_info->link, $author, array('itemprop' => 'url'))); ?>
                <?php else : ?>
                  <?php echo Text::sprintf('TPL_CONTENT_WRITTEN_BY', $author); ?>
                <?php endif; ?>
              </span>
            <?php endif; ?>
  
            <?php if ($item->displayDate) : ?>
              <span class="item-date">
                <?php echo $item->displayDate; ?>
              </span>
            <?php endif; ?>
          </div>
  
          <?php if ($params->get('show_readmore')) : ?>
            <p class="item-readmore">
              <a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
                <?php if ($item->params->get('access-view') == false) : ?>
                  <?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
                <?php elseif ($readmore = $item->alternative_readmore) : ?>
                  <?php echo $readmore; ?>
                  <?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
                <?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
                  <?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
                <?php else : ?>
                  <?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
                  <?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
                <?php endif; ?>
              </a>
            </p>
          <?php endif; ?>
        </div>
      <?php endfor ?>
    </div>
  </div>
</div>
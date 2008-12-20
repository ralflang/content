<?php
/**
 * @package content
 */
class TagController extends Horde_Controller_Base
{
    /**
     */
    public function __construct($options)
    {
        parent::__construct($options);

        $this->tagger = new Content_Tagger();
        $this->tagger->setDbAdapter(Horde_Db::getAdapter());
    }

    /**
     */
    public function searchTags()
    {
        $this->tags = $this->tagger->getTags(array(
            'q' => $this->params->q,
            'typeId' => $this->params->typeId,
            'userId' => $this->params->userId,
            'objectId' => $this->params->objectId,
        ));

        switch ((string)$this->_request->getFormat()) {
        case 'html':
            $this->render();
            break;

        case 'json':
        default:
            $this->renderText(json_encode($this->tags));
            break;
        }
    }

    public function searchUsers()
    {
    }

    public function searchObjects()
    {
    }

    /**
     * Add a tag
     */
    public function tag()
    {
        // Enforce POST only
    }

    /**
     * Remove a tag
     */
    public function untag()
    {
        // Enforce POST only
    }

}

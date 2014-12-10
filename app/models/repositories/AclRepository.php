<?php
/**
 * Created by Valentin.
 * Date: 22/11/2014
 * Time: 15:53
 */


class AclRepository extends AbstractRepository implements IAclRepository {

    public function joinUserToGroup($userId, $groupId)
    {
        $group = new AclGroup();
        $group->user_id = $userId;
        $group->group_id = $groupId;
        $group->save();
    }
} 